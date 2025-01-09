<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;

class ProductController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $products = Product::all();
        return view('ledger.products.index', compact('products'));
    }

    // 商品新規登録フォーム
    public function create()
    {
        $items = Item::all(); // 登録済みの品目を取得
        return view('ledger.products.create', compact('items'));
    }

    // 商品新規登録処理
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'item_id' => 'required|exists:items,id', // items テーブルの ID を参照
            'packaging' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|string|in:kg,g,L,mL', // 単位を指定
            'unit_weight' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'product_name' => $request->product_name,
            'item_id' => $request->item_id,
            'packaging' => $request->packaging,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'unit_weight' => $request->unit_weight,
            'price' => $request->price,
        ]);

        return redirect()->route('ledger.products.index')->with('success', '商品が登録されました。');
    }

    // 商品編集フォーム
    public function edit(Product $product)
    {
        $items = Item::all(); // 登録済みの品目を取得
        return view('ledger.products.edit', compact('product', 'items'));
    }

    // 商品情報更新処理
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'item_id' => 'required|exists:items,id',
            'packaging' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|string|in:kg,g,L,mL',
            'unit_weight' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update([
            'product_name' => $request->product_name,
            'item_id' => $request->item_id,
            'packaging' => $request->packaging,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'unit_weight' => $request->unit_weight,
            'price' => $request->price,
        ]);

        return redirect()->route('ledger.products.index')->with('success', '商品情報が更新されました。');
    }
}
