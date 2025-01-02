<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'pemesanan_id',
        'rating',
        'review_text',
    ];

    // Relasi ke tabel pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }

    // Relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

