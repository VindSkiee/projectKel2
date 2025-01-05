<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\UserVoucher;
use App\Models\Destinasi;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PemesananController extends Controller
{
    public function showPemesanan($id)
    {
        $userVouchers = UserVoucher::where('user_id', Auth::id())->get();
        $destinasi = Destinasi::findOrFail($id);
        $pemesanan = Pemesanan::all();
        return view('pemesanan', compact('destinasi', 'pemesanan', 'userVouchers'));
    }

    public function checkAvailability($destinasiId, $date, $time)
    {
        try {
            // Validate date and time
            $bookingDate = Carbon::parse($date);
            
            if ($bookingDate->isPast()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat melakukan pemesanan untuk tanggal yang sudah lewat'
                ], 400);
            }

            // Get all booked seats for the specific date and time
            $bookedSeats = Pemesanan::where('destinasi_id', $destinasiId)
                ->where('tanggal', $date)
                ->where('jam', $time)
                ->where('status_pembayaran', '!=', 'cancelled')
                ->get();

            // Compile list of all booked seats
            $allBookedSeats = [];
            foreach ($bookedSeats as $booking) {
                $seatArray = explode(',', $booking->kursi_dipilih);
                $allBookedSeats = array_merge($allBookedSeats, $seatArray);
            }

            return response()->json([
                'success' => true,
                'bookedSeats' => array_unique($allBookedSeats),
                'message' => 'Berhasil mendapatkan data ketersediaan kursi'
            ]);

        } catch (\Exception $e) {
            Log::error('Error checking availability: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memeriksa ketersediaan'
            ], 500);
        }
    }

    public function store(Request $request)
{
    // Enable query logging for debugging
    DB::enableQueryLog();
    
    try {
        // Basic validation
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nomor_hp' => 'required|string',
            'destinasi_id' => 'required|exists:destinasiWisata,id',
            'jenis_kendaraan' => 'required|in:bus,minibus',
            'kursi_dipilih' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required|in:09:00,12:00,15:00,17:00',
            'metode_pembayaran' => 'required|in:transfer',
            'total_pembayaran' => 'required|numeric',
            'voucher_id' => 'nullable|exists:vouchers,id',
        ]);

        DB::beginTransaction();

        // Check seat availability
        $selectedSeats = explode(',', $request->kursi_dipilih);
        $existingBookings = Pemesanan::where('destinasi_id', $request->destinasi_id)
            ->where('tanggal', $request->tanggal)
            ->where('jam', $request->jam)
            ->where('status_pembayaran', '!=', 'cancelled')
            ->get();

        $bookedSeats = [];
        foreach ($existingBookings as $booking) {
            $bookedSeats = array_merge($bookedSeats, explode(',', $booking->kursi_dipilih));
        }

        // Check for conflicts
        $conflictingSeats = array_intersect($selectedSeats, $bookedSeats);
        if (!empty($conflictingSeats)) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Kursi ' . implode(', ', $conflictingSeats) . ' sudah dipesan. Silakan pilih kursi lain.');
        }

        // Process voucher if exists
        $totalPembayaran = $request->total_pembayaran;
        $voucherId = null;

        if ($request->filled('voucher_id')) {
            $userVoucher = UserVoucher::where('user_id', Auth::id())
                ->where('voucher_id', $request->voucher_id)
                ->where('is_used', false)
                ->first();

            if ($userVoucher) {
                $voucher = $userVoucher->voucher;
                if (now()->greaterThan($voucher->tanggal_berakhir)) {
                    DB::rollBack();
                    return back()
                        ->withInput()
                        ->with('error', 'Voucher sudah kadaluarsa.');
                }

                $diskon = $voucher->diskon;
                $totalPembayaran = $totalPembayaran - ($totalPembayaran * $diskon / 100);
                $voucherId = $voucher->id;
                $userVoucher->update(['is_used' => true]);
            }
        }

        // Create new booking
        $pemesanan = new Pemesanan();
        $pemesanan->user_id = Auth::id();
        $pemesanan->nama_lengkap = $request->nama_lengkap;
        $pemesanan->nomor_hp = $request->nomor_hp;
        $pemesanan->destinasi_id = $request->destinasi_id;
        $pemesanan->jenis_kendaraan = $request->jenis_kendaraan;
        $pemesanan->kursi_dipilih = $request->kursi_dipilih;
        $pemesanan->tanggal = $request->tanggal;
        $pemesanan->jam = $request->jam;
        $pemesanan->metode_pembayaran = $request->metode_pembayaran;
        $pemesanan->total_pembayaran = $totalPembayaran;
        $pemesanan->status_pembayaran = 'pending';
        $pemesanan->voucher_id = $voucherId;

        // Save booking
        $pemesanan->save();

        // Commit transaction
        DB::commit();

        // Log successful booking
        Log::info('Booking created successfully', [
            'booking_id' => $pemesanan->id,
            'user_id' => Auth::id(),
            'seats' => $request->kursi_dipilih
        ]);

        return redirect()
            ->route('konfirmasi.pembayaran', ['id' => $pemesanan->id])
            ->with('success', 'Pemesanan berhasil dibuat!');

    } catch (\Exception $e) {
        // Rollback transaction on error
        DB::rollBack();
        
        // Log the error
        Log::error('Booking creation failed: ' . $e->getMessage(), [
            'user_id' => Auth::id(),
            'request_data' => $request->all(),
            'trace' => $e->getTraceAsString()
        ]);

        // Return with error message
        return back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan saat melakukan pemesanan: ' . $e->getMessage());
    }
}

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        
        try {
            $pemesanan = Pemesanan::findOrFail($id);
            
            // Validate input
            $validated = $request->validate([
                'nama_lengkap' => 'required|string',
                'nomor_hp' => 'required|string',
                'destinasi_id' => 'required|exists:destinasiWisata,id',
                'jenis_kendaraan' => 'required|in:bus,minibus',
                'kursi_dipilih' => 'required|string',
                'tanggal' => 'required|date',
                'jam' => 'required|in:09:00,12:00,15:00,17:00',
                'metode_pembayaran' => 'required|in:transfer',
                'total_pembayaran' => 'required|numeric'
            ]);

            // Check seat availability (excluding current booking)
            $selectedSeats = explode(',', $request->kursi_dipilih);
            $bookedSeats = Pemesanan::where('destinasi_id', $request->destinasi_id)
                ->where('tanggal', $request->tanggal)
                ->where('jam', $request->jam)
                ->where('id', '!=', $id)
                ->where('status_pembayaran', '!=', 'cancelled')
                ->get()
                ->pluck('kursi_dipilih')
                ->flatMap(function ($seats) {
                    return explode(',', $seats);
                })
                ->toArray();

            // Check for double booking
            $doubleBookedSeats = array_intersect($selectedSeats, $bookedSeats);
            if (!empty($doubleBookedSeats)) {
                DB::rollBack();
                return back()->with('error', 'Maaf, kursi ' . implode(', ', $doubleBookedSeats) . ' sudah dipesan. Silakan pilih kursi lain.');
            }

            $pemesanan->update($validated);
            
            DB::commit();
            return redirect()->route('konfirmasi.pembayaran', $pemesanan->id)
                ->with('success', 'Pesanan berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating booking: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui pemesanan: ' . $e->getMessage());
        }
    }

    public function cancel($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status_pembayaran = 'cancelled';
        $pemesanan->save();
        return redirect()->route('pemesanan.daftar', $pemesanan->id)
            ->with('success', 'Pesanan berhasil dibatalkan!');
    }

    public function trash($id)
    {
    
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::find($pemesanan->destinasi_id); 
        if ($pemesanan->destinasi_id) {
            $pemesanan->delete();
        }
        $pemesanan->delete();
        return redirect()->route('pemesanan.daftar.home') 
            ->with('success', 'Pesanan berhasil dihapus!');
    }

    public function success($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        $pemesanan->status_pembayaran ='paid';
        $pemesanan->save();
        return view('pembayaranSukses', compact('pemesanan', 'destinasi'));
    }

    public function daftarPesanan($id)
    {
        
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        $pemesanan = Pemesanan::where('user_id', Auth::id())->with('destinasi')->get();
        return view('daftarPesanan', compact('pemesanan', 'destinasi'));
    }

    public function daftarPesananHome()
    {
        $pemesanan = Pemesanan::where('user_id', Auth::id())->with('destinasi')->get();
        return view('daftarPesanan', compact('pemesanan'));
    }

    public function edit($id)
    {
        $userVouchers = UserVoucher::where('user_id', Auth::id())->get();
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        
        return view('editPesanan', compact('pemesanan', 'destinasi', 'userVouchers'));
    }

    public function konfirmasiPembayaran($id)
    {
        $userVouchers = UserVoucher::where('user_id', Auth::id())->get();
        $voucher = Voucher::all();
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        return view('konfirmasiPembayaran', compact('pemesanan', 'destinasi', 'voucher', 'userVouchers'));
    }

    public function home($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        return view('home', compact('pemesanan'));
    }

    
        public function cetakTiket($id)
        {
            // Ambil data pemesanan berdasarkan ID
            $pemesanan = Pemesanan::findOrFail($id);

            // Pastikan status pembayaran adalah 'paid'
            if ($pemesanan->status_pembayaran !== 'paid') {
                return redirect()->back()->with('error', 'Tiket hanya dapat dicetak untuk pemesanan yang sudah dibayar.');
            }

            // Data yang akan diteruskan ke view
            $data = [
                'pemesanan' => $pemesanan,
            ];

            // Generate PDF menggunakan DomPDF
            $pdf = PDF::loadView('cetakTiket', $data);

            // Unduh atau tampilkan file PDF
            return $pdf->stream('Tiket_' . $pemesanan->id . '.pdf'); // Tampilkan di browser
            // return $pdf->download('Tiket_' . $pemesanan->id . '.pdf'); // Unduh file PDF
        }
    
}