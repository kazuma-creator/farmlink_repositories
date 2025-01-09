<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'purchase_date',
        'content_volume',
        'quantity',
        'expiry_date',
        'lot_number',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
