<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PemesananController;
use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function show($id)
    {
        // Ambil data berdasarkan ID yang dikirimkan
        $destinasi = Destinasi::findOrFail($id);

        // Kirim data ke view
        return view('pemesanan', compact('destinasi', 'pemesanan'));
    }

}
