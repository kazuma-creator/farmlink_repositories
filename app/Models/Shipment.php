<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipments';

    protected $fillable = [
        'date', // 出荷日
        'client_id', // 取引先ID
        'cropping_id', // 作付ID
        'product_id', // 商品ID
        'unit_price', // 単価
        'quantity', // 数量
        'memo', // メモ
    ];

    // リレーション
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function cropping()
    {
        return $this->belongsTo(Cropping::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
