<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     *
     * Secara default, Laravel akan mengasumsikan nama tabel sebagai bentuk jamak dari nama model,
     * yaitu `destinasis`. Namun, jika tabel Anda bernama `destinasi`, tambahkan properti ini:
     */
    protected $table = 'destinasiWisata';

    /**
     * Kolom yang bisa diisi (mass assignment).
     * Ini melindungi data Anda dari serangan mass assignment.
     */
    protected $fillable = [
        'jarak',
        'tujuan',
        'image',
        'harga',
        'deskripsiWisata',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'destinasi_id');
    }

    

    /**
     * Menonaktifkan timestamps jika tidak digunakan.
     * (Hanya jika Anda tidak menggunakan kolom `created_at` dan `updated_at`.)
     */
    public $timestamps = true;
}
