<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesticide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active_ingredient',
        'purchase_date',
        'quantity',
        'application_rate',
        'lot_number',
    ];
}
