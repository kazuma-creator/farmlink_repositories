<?php

namespace App\Http\Controllers;

use App\Models\Cropping;
use App\Models\Worker;
use App\Models\Equipment;
use App\Models\Harvest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HarvestController extends Controller
{
    // 収穫一覧表示
    public function index()
    {
        $harvests = Harvest::with(['cropping','batches'])->get();

        return view('records.harvest.index', compact('harvests'));
    }

    // 収穫登録フォーム表示
    public function create()
    {
        $croppings = Cropping::all(); // 作付の情報
        $workers = Worker::all(); // 作業者の情報
        $equipments = Equipment::all(); // 機器設備の情報

        return view('records.harvest.create',compact('croppings','workers','equipments'));
    }

    // 収穫登録
    public function store(Request $request)
    {
        $request->validate([
            'cropping_id' => 'required|exists:croppings,id',
            'harvest_date' => 'required|date',
            'notes' => 'nullable|string',

            // lots配列を受け取る
            'lots' => 'nullable|array',
            'lots.*.field_id' => 'required|exists:fields,id',
            'lots.*.quantity' => 'required|numeric|min:0.01',
            'lots.*.unit' => 'required|string',
            'lots.*.worker_id' => 'nullable|exists:workers,id',
            'lots.*.equipment_id' => 'nullable|exists:equipment,id',
        ]);

        DB::beginTransaction();
        try{
            // 収穫データの保存
            $harvest = Harvest::create([
                'cropping_id' => $request->cropping_id,
                'harvest_date' => $request->harvest_date,
                'notes' => $request->notes,
            ]);

            // 収穫ロットデータの保存
            if(!empty($request->lots)){
                foreach($request->lots as $lot){
                    $harvest->batches()->create([
                        'field_id' => $lot['field_id'],
                        'quantity' => $lot['quantity'],
                        'unit' => $lot['unit'],
                        'worker_id' => $lot['worker_id'] ?? null,
                        'equipment_id' => $lot['equipment_id'] ?? null,
                    ]);
                }
            }
            DB::commit();

            return redirect()
                ->route('records.harvest.index')
                ->with('message', '収穫データを登録しました'); 
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('message', '収穫データの登録に失敗しました'.$e->getMessage());
        }
    }
}
