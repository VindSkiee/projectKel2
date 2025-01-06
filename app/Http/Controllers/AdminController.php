<?php

namespace App\Http\Controllers;
use App\Models\Destinasi;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.homeAdmin'); // Halaman khusus admin
    }

    public function pesanan()
    {
        // Ambil semua pesanan dari semua user
        $orders = Pemesanan::with('destinasi')  // Relasi ke destinasi
            ->select('id', 'nomor_hp', 'nama_lengkap', 'user_id', 'destinasi_id', 'total_pembayaran', 'status_pembayaran', 'tanggal', 'created_at')
            ->get();

        return view('admin.daftarPesananAdmin', compact('orders'));
    }

    public function edit()
    {
        // Ambil data destinasi dan pemesanan berdasarkan ID
        $destinasi = Destinasi::all();
        $pemesanan = Pemesanan::all();

        // Tampilkan halaman dengan data destinasi dan pemesanan
        return view('admin.destinasiAdmin', compact('destinasi', 'pemesanan'));
    }

    // Fungsi untuk mengupdate destinasi dan pemesanan
    public function update(Request $request)
    {
        $request->validate([
            'destinasi_id' => 'required|exists:destinasiwisata,id',
            'harga' => 'required|string', // Pastikan harga adalah angka yang valid
        ]);

        // Temukan destinasi berdasarkan ID yang dikirimkan
        $destinasi = Destinasi::find($request->destinasi_id);

        // Update harga destinasi
        $destinasi->harga = $request->harga;

        // Simpan perubahan ke database
        $destinasi->save();

        // Kembalikan dengan pesan sukses
        return back()->with('success', 'Harga destinasi berhasil diperbarui!');
    }
}
