<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\UserVoucher;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{

    public function home($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        return view('home', compact('pemesanan'));
    }
    public function showPemesanan($id)
    {
        // Ambil data berdasarkan ID yang dikirimkan
        $userVouchers = UserVoucher::where('user_id', Auth::id())->get();
        $destinasi = Destinasi::findOrFail($id);
        $pemesanan = Pemesanan::all();
        // Kirim data ke view
        return view('pemesanan', compact('destinasi', 'pemesanan', 'userVouchers'));
    }

    // public function store(Request $request, Destinasi $destinasi)
    // {
    //     DB::enableQueryLog();
    //     $request->validate([
    //             'nama_lengkap' => 'required|string',
    //             'nomor_hp' => 'required|string',
    //             'destinasi_id' => 'required|exists:destinasiWisata,id',
    //             'jenis_kendaraan' => 'required|in:bus,minibus',
    //             'kursi_dipilih' => 'required|string',
    //             'tanggal' => 'required|date',
    //             'jam' => 'required|in:09:00,12:00,15:00,17:00',
    //             'metode_pembayaran' => 'required|in:transfer',
    //             'total_pembayaran' => 'required|numeric'
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         $pemesanan = new Pemesanan();
    //         $pemesanan->user_id = auth()->user()->id;
    //         $destinasi = Destinasi::findOrFail($request->input('destinasi_id'));          
    //         $pemesanan->nama_lengkap = $request->input('nama_lengkap');
    //         $pemesanan->nomor_hp = $request->input('nomor_hp');
    //         $pemesanan->destinasi_id = $destinasi->id;
    //         $pemesanan->jenis_kendaraan = $request->input('jenis_kendaraan');
    //         $pemesanan->metode_pembayaran = $request->input('metode_pembayaran');
    //         $pemesanan->kursi_dipilih = $request->input('kursi_dipilih');
    //         $pemesanan->tanggal = $request->input('tanggal');
    //         $pemesanan->jam = $request->input('jam');
    //         $pemesanan->total_pembayaran = $request->input('total_pembayaran');
    //         $pemesanan->status_pembayaran = 'pending';
    //         $pemesanan->save();
    //         DB::commit();

    //         return redirect()->route('konfirmasi.pembayaran', ['id' => $pemesanan->id]);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Error: ' . $e->getMessage());
    //         return back()->with('error', 'Terjadi kesalahan saat melakukan pemesanan: ' . $e->getMessage());
    //     }
    // }

    public function store(Request $request, Destinasi $destinasi)
    {
        DB::enableQueryLog();
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
            'voucher_id' => 'nullable|exists:vouchers,id', // Tambahkan validasi voucher
        ]);

        DB::beginTransaction();

        try {
            // Cek apakah voucher digunakan
            $diskon = 0; // Nilai diskon awal
            $voucher = null;

            if ($request->voucher_id) {
                // Cari voucher yang valid untuk user ini
                $userVoucher = UserVoucher::where('user_id', auth()->id())
                    ->where('voucher_id', $request->voucher_id)
                    ->where('is_used', false) // Pastikan voucher belum digunakan
                    ->first();

                if ($userVoucher) {
                    $voucher = $userVoucher->voucher;
                    if (now()->greaterThan($voucher->tanggal_berakhir)) {
                        return back()->with('error', 'Voucher sudah kadaluarsa.');
                    }

                    $diskon = $voucher->diskon; // Ambil persentase diskon
                    $userVoucher->update(['is_used' => true]); // Tandai voucher sebagai digunakan
                } else {
                    return back()->with('error', 'Voucher tidak valid atau sudah digunakan.');
                }
            }

            // Hitung total pembayaran setelah diskon
            $totalPembayaran = $request->input('total_pembayaran');
            if ($diskon > 0) {
                $totalPembayaran -= ($totalPembayaran * $diskon / 100);
            }

            // Simpan pemesanan
            $pemesanan = new Pemesanan();
            $pemesanan->user_id = auth()->user()->id;
            $destinasi = Destinasi::findOrFail($request->input('destinasi_id'));
            $pemesanan->nama_lengkap = $request->input('nama_lengkap');
            $pemesanan->nomor_hp = $request->input('nomor_hp');
            $pemesanan->destinasi_id = $destinasi->id;
            $pemesanan->jenis_kendaraan = $request->input('jenis_kendaraan');
            $pemesanan->metode_pembayaran = $request->input('metode_pembayaran');
            $pemesanan->kursi_dipilih = $request->input('kursi_dipilih');
            $pemesanan->tanggal = $request->input('tanggal');
            $pemesanan->jam = $request->input('jam');
            $pemesanan->total_pembayaran = $totalPembayaran; // Simpan total pembayaran setelah diskon
            $pemesanan->status_pembayaran = 'pending';
            $pemesanan->voucher_id = $voucher ? $voucher->id : null; // Simpan voucher jika digunakan
            $pemesanan->save();

            DB::commit();

            return redirect()->route('konfirmasi.pembayaran', ['id' => $pemesanan->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat melakukan pemesanan: ' . $e->getMessage());
        }
    }


    public function konfirmasiPembayaran($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        return view('konfirmasiPembayaran', compact('pemesanan', 'destinasi'));
    }

    public function getBookedSeats($jenisKendaraan, $destinasiId)
    {
        try {
            $bookedSeats = Pemesanan::where('destinasi_id', $destinasiId)
                ->where('jenis_kendaraan', $jenisKendaraan)
                ->pluck('kursi_dipilih')
                ->toArray();
    
            // Menggabungkan semua kursi yang telah dipesan ke dalam array
            $bookedSeatsArray = [];
            foreach ($bookedSeats as $seats) {
                $bookedSeatsArray = array_merge($bookedSeatsArray, explode(',', $seats));
            }
    
            return response()->json($bookedSeatsArray);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data kursi yang sudah dipesan: ' . $e->getMessage(),
            ], 500);
        }
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
        return view('pemesanan.index', compact('pemesanan', 'destinasi'));
    }

    public function daftarPesananHome()
    {
        $pemesanan = Pemesanan::where('user_id', Auth::id())->with('destinasi')->get();
        return view('daftarPesanan', compact('pemesanan'));
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $destinasi = Destinasi::findOrFail($pemesanan->destinasi_id);
        
        return view('editPesanan', compact('pemesanan', 'destinasi'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        
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

        $pemesanan->update($validated);
        
        return redirect()->route('konfirmasi.pembayaran', $pemesanan->id)
            ->with('success', 'Pesanan berhasil diperbarui!');
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

}