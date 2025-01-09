<?php

namespace App\Http\Controllers;

use App\Models\Pesticide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PesticideController extends Controller
{
    // 農薬の一覧表示
    public function index()
    {
        $pesticides = Pesticide::all();

        return view('materials.pesticides.index', compact('pesticides'));
    }

    // 農薬の新規登録フォーム
    public function create()
    {
        return view('materials.pesticides.create',);
    }

    // 農薬の新規登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active_ingredient' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'quantity' => 'required|numeric|min:0',
            'application_rate' => 'required|numeric|min:0',
            'lot_number' => 'nullable|string|max:255',
        ]);

        Pesticide::create($request->all());

        return redirect()->route('materials.pesticides.index')->with('success', '農薬が登録されました。');
    }

    // 農薬の編集フォーム
    public function edit(Pesticide $pesticide)
    {
        return view('materials.pesticides.edit', compact('pesticide'));
    }

    // 農薬の更新処理
    public function update(Request $request, Pesticide $pesticide)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'active_ingredient' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'quantity' => 'required|numeric|min:0',
            'application_rate' => 'required|numeric|min:0',
            'lot_number' => 'nullable|string|max:255',
        ]);

        $pesticide->update($request->all());

        return redirect()->route('materials.pesticides.index')->with('success', '農薬が更新されました。');
    }

    // WAGRI農業情報APIを用いた検索メソッド
    public function searchByWagri(Request $request)
    {
        // 1.ユーザーが入力した検索ワード
        $query = $request->input('q');
        if(!$query){
            // 空文字なら空配列を返す
            return response()->json([]);
        }

        // 2.WAGRI農業情報APIのエンドポイント
        $endpoint = 'https://wagri.naro.go.jp/wagri_api/agriculturalchemical_get/';

        $params = [
            'chemical_name' => $query,
        ];

        // 3.外部APIにリクエストを送信
        $response = Http::get($endpoint, $params);
        if($response->failed()){
            return response()->json(['error'=>'検索に失敗しました'], 500);
        }

        // JSONデータを取得
        $data = $response->json();

        $items = $data['result'] ?? [];

        // 4.フロントエンドで使いやすい形式に整形
        $formatted = collect($items)->map(function($item){
            return [
                'id' => $item['pesticide_id'] ?? '',
                'text' => $item['chemical_name'] ?? '',
            ];
        })->all();

        // 5.整形したデータをJSON形式で返す
        return response()->json($formatted);
    }
}
