<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Menampilkan halaman review.
     */
    public function index()
    {
        // Ambil pesanan dengan status 'Paid' milik user yang login
        $paidOrders = Pemesanan::with('destinasi') // Pastikan relasi 'destinasi' ada di model Pemesanan
            ->where('user_id', Auth::id())
            ->where('status_pembayaran', 'Paid')
            ->get();

        // Ambil semua review milik user yang login
        $userReviews = Review::with('pemesanan.destinasi') // Pastikan relasi ini ada di model Review
            ->where('user_id', Auth::id())  
            ->latest()
            ->get();

        return view('review', compact('paidOrders', 'userReviews'));
    }

    /**
     * Menyimpan review baru.
     */
    public function store(Request $request)
{
    $request->validate([
        'pemesanan_id' => 'required|exists:pemesanan,id',
        'rating' => 'required|integer|min:1|max:5',
        'review_text' => 'nullable|string',
    ]);

    // Cek apakah pesanan sudah direview sebelumnya
    $existingReview = Review::where('pemesanan_id', $request->input('pemesanan_id'))
        ->where('user_id', Auth::id())
        ->first();

    if ($existingReview) {
        return response()->json([
            'message' => 'Anda sudah memberikan review untuk pesanan ini.'
        ], 400);
    }

    // Simpan review baru
    $review = Review::create([
        'user_id' => Auth::id(),
        'pemesanan_id' => $request->input('pemesanan_id'),
        'rating' => $request->input('rating'),
        'review_text' => $request->input('review_text'),
    ]);

    // Ambil data review dengan relasi
    $review->load('user', 'pemesanan.destinasi');

    return response()->json([
        'message' => 'Review berhasil disimpan!',
        'review' => $review,
        'destinasi' => $review->pemesanan->destinasi->tujuan ?? 'Destinasi tidak ditemukan',
        'rating' => $review->rating,
        'review_text' => $review->review_text // SEMANGAT WEBPRO
    ]);
}

}
