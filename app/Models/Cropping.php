<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cropping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // 作付名
        'item_id', // 品目ID
        'field_id', // 圃場ID
        'planting_date', // 植付日
        'expected_yield', // 予想収量
        'yield_unit', // 収量単位
        'color', // 色
    ];
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
}
