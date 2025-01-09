<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('ledger.clients.index', compact('clients'));
    }
    public function create()
    {
        return view('ledger.clients.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'official_name' => 'required|string|max:255',
            'kana' => 'required|string|max:255',
            'app_registered_name' => 'required|string|max:255',
        ],[
            'official_name.required' => '正式名称を入力してください。',
            'kana.required' => 'よみがなを入力してください。',
            'app_registered_name.required' => 'アプリ登録名を入力してください。',
        ]);

        Client::create([
            'official_name' => $request->official_name,
            'kana' => $request->kana,
            'app_registered_name' => $request->app_registered_name,
        ]);

        return redirect()->route('ledger.clients.index')->with('success', '取引先が登録されました。');
    }

    public function edit(Client $client)
    {
        return view('ledger.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'official_name' => 'required|string|max:255',
            'kana' => 'required|string|max:255',
            'app_registered_name' => 'required|string|max:255',
        ]);

        $client->update([
            'official_name' => $request->official_name,
            'kana' => $request->kana,
            'app_registered_name' => $request->app_registered_name,
        ]);

        return redirect()->route('ledger.clients.index')->with('success', '取引先情報が更新されました。');
    }
}
