<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        // Ambil pesanan Paid milik user
        $paidOrders = Pemesanan::where('user_id', Auth::id())
            ->where('status_pembayaran', 'Paid')
            ->get();

        // Ambil review yang sudah dibuat user
        $userReviews = Review::where('user_id', Auth::id())
            ->with('pemesanan')
            ->latest()
            ->get();

        return view('review', compact('paidOrders', 'userReviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanan,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'pemesanan_id' => $request->input('pemesanan_id'),
            'rating' => $request->input('rating'),
            'review_text' => $request->input('review_text'),
        ]);

        return back()->with('success', 'Review berhasil disimpan!');
    }
}
