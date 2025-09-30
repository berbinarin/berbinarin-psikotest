<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherCode extends Model
{
    use HasFactory;

    protected $table = 'voucher_codes';

    protected $fillable = [
        'category',
        'name',
        'code',
        'percentage',
        'voucher_type',
        'detail',
    ];
}
