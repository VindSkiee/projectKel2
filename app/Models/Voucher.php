<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    use HasFactory;

    protected $fillable = [
        'kode', 
        'diskon', 
        'tanggal_berakhir'
    ];

    public function userVouchers()
    {
        return $this->hasMany(UserVoucher::class);
    }
}
