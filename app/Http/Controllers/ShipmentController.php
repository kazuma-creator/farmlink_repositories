<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Cropping;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * 出荷一覧を表示
     */
    public function index()
    {
        // 出荷データを全件 or 条件つきで取得
        // 例: 関連先(client, cropping, product) を eager load
        $shipments = Shipment::with(['client', 'cropping', 'product'])->get();

        return view('records.shipments.index', compact('shipments'));
    }

    /**
     * 出荷登録フォーム
     */
    public function create()
    {
        // フォームで選択する取引先や作付名、商品名などを取得
        $clients   = Client::all();     // 取引先
        $croppings = Cropping::all();   // 作付
        $products  = Product::all();    // 商品マスタなどがある場合

        return view('records.shipments.create', compact('clients', 'croppings', 'products'));
    }

    /**
     * 出荷データをDBに保存
     */
    public function store(Request $request)
    {
        // バリデーション: 必須項目など
        $request->validate([
            'date'        => 'required|date',            // 日付
            'client_id'   => 'required|exists:clients,id', 
            'cropping_id' => 'nullable|exists:croppings,id', // 作付(出荷品が作付から来る場合)
            'product_id'  => 'nullable|exists:products,id',  // 商品(出荷品が製品マスタから来る場合)
            'unit_price'  => 'required|numeric|min:0',
            'quantity'    => 'required|numeric|min:0.01',
            'memo'        => 'nullable|string',
        ]);

        // DB保存
        $shipment = Shipment::create([
            'date'        => $request->date,
            'client_id'   => $request->client_id,
            'cropping_id' => $request->cropping_id,
            'product_id'  => $request->product_id,
            'unit_price'  => $request->unit_price,
            'quantity'    => $request->quantity,
            'memo'        => $request->memo,
        ]);

        // 登録後は一覧画面へ
        return redirect()->route('record.shipment.index')
                         ->with('message', '出荷データを登録しました');
    }
}
