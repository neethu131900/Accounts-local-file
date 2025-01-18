<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaizenTmp extends Model
{
    use HasFactory;

    protected $fillable = ['mid_id', 'settlement_type', 'transaction_date'];
}
