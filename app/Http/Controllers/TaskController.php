<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Item;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('ledger.tasks.index', compact('tasks'));
    }

    // 作業登録画面
    public function create()
    {
        $items = Item::all(); // 登録済みの品目を取得
        return view('ledger.tasks.create', compact('items'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'crop_name' => 'required|string|exists:items,crop_name',
            'task_name' => 'required|string|max:255',
        ]);

        Task::create([
            'crop_name' => $request->crop_name,
            'task_name' => $request->task_name,
        ]);

        return redirect()->route('ledger.tasks.index')->with('success', '作業が登録されました。');
    }

    // 作業編集画面
    public function edit(Task $task)
    {
        $items = Item::all(); // 登録済みの品目を取得
        return view('ledger.tasks.edit', compact('task', 'items'));
    }

    // 作業情報更新
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'crop_name' => 'required|string|exists:items,crop_name',
            'task_name' => 'required|string|max:255',
        ]);

        $task->update([
            'crop_name' => $request->crop_name,
            'task_name' => $request->task_name,
        ]);

        return redirect()->route('ledger.tasks.index')->with('success', '作業情報が更新されました。');
    }
}
