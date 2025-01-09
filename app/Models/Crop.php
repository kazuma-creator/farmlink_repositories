<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', //ユーザーID
        'product_name', //商品名
        'name', //品種名
        'cultivation_method', //栽培方法
        'fertilizer_info', //肥料情報
        'pesticide_info', //農薬情報
        'description', //作物の説明
        'cooking_tips', //料理のコツ
        'image', //画像
        'images', //画像
        'video', //動画
        'template_id', //テンプレートID
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Templateとのリレーション
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

}
