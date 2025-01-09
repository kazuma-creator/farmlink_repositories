<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HarvestLot;
use App\Models\Field;
use App\Models\Cropping;

class HarvestLotController extends Controller
{
    // ロット登録フォーム表示
    public function create()
    {
        $fields = Field::all(); // 圃場の選択肢

        return view('records.harvest.lot.create',compact('fields'));
    }

    // ロット情報を親ウィンドウに送信
    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'quantity' => 'required|numeric|min:0.01',
            'unit' => 'required|string',
        ]);

        $field = Field::find($request->field_id);

        $lotData = [
            'field_id' => $field->id,
            'fieldName' => $field->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ];

        // ロット情報を親ウィンドウに送信
        return response()->json($lotData);
    }
}
