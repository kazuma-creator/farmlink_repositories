<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // 肥料名
        'nutrient', // 栄養素
        'purchase_date', // 購入日または棚卸日
        'quantity', // 数量 デフォルトは0
        'application_rate', // 散布量
        'lot_number', // ロット番号
    ];
}
