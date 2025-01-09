<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{

    public function index()
    {
        $fields = Field::all();

        return view('ledger.fields.index', compact('fields'));
    }
    public function create()
    {
        return view('ledger.fields.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string|max:255',
            'area' => 'required|numeric',
            'area_unit' => 'required|string',
            'ownership' => 'required|string',
        ]);

        Field::create([
            'type' => $request->type,
            'name' => $request->name,
            'area' => $request->area,
            'area_unit' => $request->area_unit,
            'ownership' => $request->ownership,
        ]);

        return redirect()->route('ledger.fields.index')->with('success', '圃場が登録されました。');
    }

    public function edit(Field $field)
    {
        return view('ledger.fields.edit', compact('field'));
    }

    public function update(Request $request, Field $field)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area' => 'required|numeric',
            'ownership' => 'required|string',
        ]);

        $field->update([
            'name' => $request->name,
            'area' => $request->area,
            'ownership' => $request->ownership,
        ]);

        return redirect()->route('ledger.fields.index')->with('success', '圃場情報が更新されました。');
    }

}
