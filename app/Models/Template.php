<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    // テーブル名を指定（デフォルトでは「templates」と一致するため省略可能）
    protected $table = 'templates';

    // 書き換え可能なカラムを指定
    protected $fillable = [
        'name',         // テンプレート名
        'blade_file',   // Bladeファイル名
        'preview_image' // プレビュー画像のパス
    ];

    // テンプレートが使用されている農作物を取得
    public function crops()
    {
        return $this->hasMany(Crop::class, 'template_id');
    }
}
