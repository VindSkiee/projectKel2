<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = [
        'nama_lengkap',
        'nomor_hp',
        'destinasi_id',
        'jenis_kendaraan',
        'kursi_dipilih',
        'metode_pembayaran',
        'total_pembayaran',
        'status_pembayaran',
        'tanggal',
        'jam',
        'created_at',
    ];

    // Relasi ke tabel destinasi
    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class, 'destinasi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'pemesanan_id');
    }
}