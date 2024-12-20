<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cropping;
use App\Models\Item;
use App\Models\Field;

class CroppingController extends Controller
{
    public function index()
    {
        $croppings = Cropping::all();
        return view('cropping.index', compact('croppings'));
    }

    public function create()
    {
        $fields = Field::all();
        return view('cropping.create', compact('fields'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'item_id' => 'required|exists:items,id',
            'field_id' => 'required|exists:fields,id',
            'planting_date' => 'required|date',
            'expected_yield' => 'required|numeric',
            'yield_unit' => 'required|in:kg,t',
            'color' => 'required|string|max:7', // Hex color code
        ]);

        Cropping::create($request->all());

        return redirect()->route('cropping.index')->with('success', '作付が登録されました。');
    }
}