<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LedgerController extends Controller
{
    public function index()
    {
        return view('ledger.index');
    }

    public function fields()
    {
        return view('ledger.fields');
    }

    public function workers()
    {
        return view('ledger.workers');
    }

    public function clients()
    {
        return view('ledger.clients');
    }

    public function items()
    {
        return view('ledger.items');
    }

    public function tasks()
    {
        return view('ledger.tasks');
    }

    public function equipment()
    {
        return view('ledger.equipment');
    }

    public function products()
    {
        return view('ledger.products');
    }
}
