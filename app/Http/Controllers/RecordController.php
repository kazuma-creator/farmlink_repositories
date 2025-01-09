<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all(); // 記録一覧取得
        return view('records.index', compact('records'));
    }

    public function create()
    {
        return view('records.create'); // 記録作成ページ
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Record::create($validated);

        return redirect()->route('records.index')->with('success', '記録が作成されました。');
    }
}
