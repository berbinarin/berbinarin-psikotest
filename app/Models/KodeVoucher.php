<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeVoucher extends Model
{
    use HasFactory;

    protected $table = 'kode_voucher';

    protected $fillable = [
        'category',
        'nama_voucher',
        'code',
        'percentage',
        'tipe',
        'detail',
    ];
}
