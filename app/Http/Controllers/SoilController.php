<?php

namespace App\Http\Controllers;

use App\Models\Soil;
use Illuminate\Http\Request;

class SoilController extends Controller
{
    // 土壌一覧表示
    public function index()
    {
        $soils = Soil::all();
        return view('materials.soils.index', compact('soils'));
    }

    // 土壌新規登録フォーム
    public function create()
    {
        return view('materials.soils.create');
    }

    // 土壌新規登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // 土壌名
            'purchased_date' => 'required|date', // 購入日/棚卸日
            'content_volume' => 'nullable|numeric|min:0', // 内容量
            'unit' => 'nullable|string|in:kg,g', // 内容量の単位(kg,g)
            'quantity' => 'nullable|integer|min:0', // 数量
            'purchase_price' => 'nullable|numeric|min:0', // 購入価格
            'supplier' => 'nullable|string|max:255', // 仕入先
        ]);

        Soil::create([
            'name' => $request->name,
            'purchased_date' => $request->purchased_date,
            'content_volume' => $request->content_volume,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'supplier' => $request->supplier,
        ]);

        return redirect()->route('materials.soils.index')->with('success', '土壌が登録されました。');
    }

    // 土壌編集フォーム
    public function edit(Soil $soil)
    {
        return view('materials.soils.edit', compact('soil'));
    }

    // 土壌情報更新処理
    public function update(Request $request, Soil $soil)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'purchased_date' => 'required|date',
            'content_volume' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|in:kg,g',
            'quantity' => 'nullable|integer|min:0',
            'purchase_price' => 'nullable|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
        ]);

        $soil->update([
            'name' => $request->name,
            'purchased_date' => $request->purchased_date,
            'content_volume' => $request->content_volume,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'supplier' => $request->supplier,
        ]);

        return redirect()->route('materials.soils.index')->with('success', '土壌情報が更新されました。');
    }
}
