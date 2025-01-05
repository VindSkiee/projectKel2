<?php

namespace App\Http\Controllers;
use App\Models\userVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class VoucherController extends Controller
{
    public function voucher()
    {
        $voucher = Voucher::all();
        return view('admin.voucherAdmin', compact('voucher'));
    }

    public function voucherUser()
    {
        $userVouchers = UserVoucher::where('user_id', Auth::id())->get();

        
        return view('voucherUser', compact('userVouchers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:vouchers,kode',
            'diskon' => 'required|numeric|between:0,100',
            'tanggal_berakhir' => 'required|date|after:today',
        ]);

        Voucher::create($request->all());
        return redirect()->route('voucher.admin')->with('success', 'Voucher berhasil ditambahkan!');
    }

    public function storeUser(Request $request)
    {
            // Validasi input kode voucher
        $request->validate([
            'kode' => 'required|exists:vouchers,kode', // Pastikan kode voucher ada di database
        ]);

        // Ambil voucher berdasarkan kode
        $voucher = Voucher::where('kode', $request->kode)->first();

        // Pastikan voucher masih berlaku dan belum digunakan
        if ($voucher->is_used) {
            return back()->with('error', 'Voucher sudah digunakan!');
        }

        if ($voucher->tanggal_berakhir < now()) {
            return back()->with('error', 'Voucher sudah kedaluwarsa!');
        }

        // Menyimpan voucher ke session
        session()->push('user_vouchers', $voucher);

        return back()->with('success', 'Voucher berhasil ditambahkan ke list!');
    }

    public function claimVoucher(Request $request)
    {
        try {
            $request->validate(['kode_voucher' => 'required']);

            $voucher = Voucher::where('kode', $request->kode_voucher)
                ->whereDate('tanggal_berakhir', '>=', now())
                ->first();

            if (!$voucher) {
                return back()->with('error', 'Kode voucher tidak valid atau sudah tidak tersedia.');
            }

            $alreadyClaimed = UserVoucher::where('user_id', Auth::id())
                ->where('voucher_id', $voucher->id)
                ->exists();

            if ($alreadyClaimed) {
                return back()->with('error', 'Anda sudah meng-claim voucher ini.');
            }

            $userVoucher = UserVoucher::create([
                'user_id' => Auth::id(),
                'voucher_id' => $voucher->id,
            ]);

            if (!$userVoucher) {
                Log::error('Failed to save voucher claim', [
                    'user_id' => Auth::id(),
                    'voucher_id' => $voucher->id,
                    'timestamp' => now()
                ]);
                return back()->with('error', 'Gagal menyimpan voucher. Silakan coba lagi.');
            }

            return back()->with('success', 'Voucher berhasil di-claim!');
        } catch (\Exception $e) {
            Log::error('Voucher claim error: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'voucher_code' => $request->kode_voucher,
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function clearSession()
    {
        // Hapus key 'user_vouchers' dari session
        session()->forget('user_vouchers');

        return back()->with('success', 'Voucher list berhasil dihapus dari session!');
    }

    
}
