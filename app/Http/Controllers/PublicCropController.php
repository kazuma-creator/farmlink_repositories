<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Template; // Templateモデルをインポート
use Illuminate\Http\Request;

class PublicCropController extends Controller
{
    // 公開用の農作物詳細ページの表示
    public function show($id)
    {
        // IDから該当する農作物を取得
        $crop = Crop::with(['user', 'template'])->findOrFail($id);

        // 関連するテンプレートを取得
        $template = $crop->template;

        // テンプレートが設定されていない場合、デフォルトのビューを使用
        $view = $template ? $template->blade_file : 'crops.public_show';

        // 公開用のビューを表示する
        return view($view, [
            'crop' => $crop,
            'farm_name' => $crop->user->farm_name ?? '未登録',
            'farm_address' => $crop->user->farm_address ?? '未登録',
            'icon' => $crop->user->icon ?? '未登録',
            'name' => $crop->user->name ?? '未登録',
        ]);
    }
}
