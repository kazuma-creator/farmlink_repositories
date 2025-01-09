<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    // 作業員一覧
    public function index()
    {
        $workers = Worker::all();

        return view('ledger.workers.index', compact('workers'));
    }
    // 作業員登録画面
    public function create()
    {
        return view('ledger.workers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kana' => 'required|string|max:255',
        ]);

        Worker::create([
            'name' => $request->name,
            'kana' => $request->kana,
        ]);

        return redirect()->route('ledger.workers.index')->with('success', '作業員が登録されました。');
    }
    // 作業員編集画面
    public function edit(Worker $worker)
    {
        return view('ledger.workers.edit', compact('worker'));
    }
    // 作業員情報更新
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kana' => 'required|string|max:255',
        ]);

        $worker->update([
            'name' => $request->name,
            'kana' => $request->kana,
        ]);

        return redirect()->route('ledger.workers.index')->with('success', '作業員情報が更新されました。');
    }
}
