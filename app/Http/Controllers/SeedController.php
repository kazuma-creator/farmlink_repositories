<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\Item;
use Illuminate\Http\Request;

class SeedController extends Controller
{
    public function index()
    {
        // 種苗一覧を取得
        $seeds = Seed::with('item')->get();

        return view('materials.seeds.index', compact('seeds'));
    }

    public function create()
    {
        // items テーブルのデータを取得
        $items = Item::all();

        return view('materials.seeds.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'purchase_date' => 'nullable|date',
            'content_volume' => 'nullable|numeric',
            'quantity' => 'required|integer|min:0',
            'expiry_date' => 'nullable|date',
            'lot_number' => 'nullable|string|max:255',
        ]);

        Seed::create($request->all());

        return redirect()->route('materials.seeds.index')->with('success', '種苗が登録されました。');
    }
}
