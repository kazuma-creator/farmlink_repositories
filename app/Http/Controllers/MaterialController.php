<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    // おおもとの画面
    public function materialIndex()
    {
        return view('materials.index');
    }
    // 資材一覧表示
    public function index()
    {
        $materials = Material::all();

        return view('materials.materials.index', compact('materials'));
    }

    // 資材新規登録フォーム
    public function create()
    {
        return view('materials.materials.create');
    }

    // 資材新規登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'purchased_date' => 'nullable|date',
            'content_volume' => 'nullable|numeric',
            'unit' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'purchase_price' => 'nullable|numeric',
            'supplier' => 'nullable|string|max:255',
        ]);

        Material::create($request->all());

        return redirect()->route('materials.materials.index')->with('success', '資材が登録されました。');
    }

    // 資材編集フォーム
    public function edit(Material $material)
    {
        return view('materials.materials.edit', compact('material'));
    }

    // 資材情報更新処理
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'purchased_date' => 'required|date',
            'content_volume' => 'nullable|numeric',
            'unit' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'purchase_price' => 'nullable|numeric',
            'supplier' => 'nullable|string|max:255',
        ]);

        $material->update($request->all());

        return redirect()->route('materials.materials.index')->with('success', '資材情報が更新されました。');
    }
}
