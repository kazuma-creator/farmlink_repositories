<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('ledger.items.index', compact('items'));
    }

    public function create()
    {
        return view('ledger.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'crop_name' => 'required|string|max:255',
            'variety_name' => 'required|string|max:255',
        ]);

        Item::create([
            'crop_name' => $request->crop_name,
            'variety_name' => $request->variety_name,
        ]);

        return redirect()->route('ledger.items.index')->with('success', '品目が登録されました。');
    }

    public function edit(Item $item)
    {
        return view('ledger.items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'crop_name' => 'required|string|max:255',
            'variety_name' => 'required|string|max:255',
        ]);

        $item->update([
            'crop_name' => $request->crop_name,
            'variety_name' => $request->variety_name,
        ]);

        return redirect()->route('ledger.items.index')->with('success', '品目情報が更新されました。');
    }
}
