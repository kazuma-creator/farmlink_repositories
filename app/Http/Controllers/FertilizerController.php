<?php

namespace App\Http\Controllers;

use App\Models\Fertilizer;
use Illuminate\Http\Request;

class FertilizerController extends Controller
{
    // 肥料の一覧表示
    public function index()
    {
        $fertilizers = Fertilizer::all();

        return view('materials.fertilizers.index', compact('fertilizers'));
    }

    // 肥料の新規登録フォーム
    public function create()
    {
        return view('materials.fertilizers.create');
    }

    // 肥料の新規登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nutrient' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'quantity' => 'required|numeric|min:0',
            'application_rate' => 'required|numeric|min:0',
            'lot_number' => 'nullable|string|max:255',
        ]);

        Fertilizer::create($request->all());

        return redirect()->route('materials.fertilizers.index')->with('success', '肥料が登録されました。');
    }

    // 肥料の編集フォーム
    public function edit(Fertilizer $fertilizer)
    {
        return view('materials.fertilizers.edit', compact('fertilizer'));
    }

    // 肥料の更新処理
    public function update(Request $request, Fertilizer $fertilizer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nutrient' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'quantity' => 'required|numeric|min:0',
            'application_rate' => 'required|numeric|min:0',
            'lot_number' => 'nullable|string|max:255',
        ]);

        $fertilizer->update($request->all());

        return redirect()->route('materials.fertilizers.index')->with('success', '肥料が更新されました。');
    }
}
