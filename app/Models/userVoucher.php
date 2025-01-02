<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userVoucher extends Model
{
    use HasFactory;

    protected $table = 'user_vouchers';

    protected $fillable = [
        'user_id',
        'voucher_id',
        'is_used',
        
    ];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
