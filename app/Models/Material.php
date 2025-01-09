<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'purchased_date',
        'content_volume',
        'unit',
        'quantity',
        'purchase_price',
        'supplier',
    ];
}
