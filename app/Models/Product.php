<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'item_id',
        'packaging',
        'quantity',
        'unit',
        'unit_weight',
        'price',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
