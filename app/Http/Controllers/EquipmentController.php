<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    // 機械設備一覧
    public function index()
    {
        $equipment = Equipment::all();
        return view('ledger.equipment.index', compact('equipment'));
    }
    // 機械設備登録フォーム
    public function create()
    {
        return view('ledger.equipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'acquisition_date' => 'nullable|date',
            'unit_price' => 'nullable|numeric',
        ]);

        Equipment::create([
            'name' => $request->name,
            'model' => $request->model,
            'manufacturer' => $request->manufacturer,
            'fuel_type' => $request->fuel_type,
            'acquisition_date' => $request->acquisition_date,
            'unit_price' => $request->unit_price,
        ]);

        return redirect()->route('ledger.equipment.index')->with('success', '機械設備が登録されました。');
    }

    // 機械設備編集フォーム
    public function edit(Equipment $equipment)
    {
        return view('ledger.equipment.edit', compact('equipment'));
    }
    // 機械設備情報更新処理
    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'acquisition_date' => 'nullable|date',
            'unit_price' => 'nullable|numeric',
        ]);

        $equipment->update([
            'name' => $request->name,
            'model' => $request->model,
            'manufacturer' => $request->manufacturer,
            'fuel_type' => $request->fuel_type,
            'acquisition_date' => $request->acquisition_date,
            'unit_price' => $request->unit_price,
        ]);

        return redirect()->route('ledger.equipment.index')->with('success', '機械設備情報が更新されました。');
    }
}
