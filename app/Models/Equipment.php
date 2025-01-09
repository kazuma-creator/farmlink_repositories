<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // 機械設備名
        'model', // 型式
        'manufacturer', // メーカー
        'fuel_type', // 燃料種別
        'acquisition_date', // 取得日
        'unit_price', // 取得価格
    ];
}
