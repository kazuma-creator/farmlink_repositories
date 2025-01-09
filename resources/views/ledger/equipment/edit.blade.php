@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">機械設備編集</h1>

    <form action="{{ route('ledger.equipment.update', $equipment->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="equipment_name" class="block text-gray-700 text-sm font-bold mb-2">機械設備名</label>
            <input type="text" name="equipment_name" id="equipment_name" value="{{ $equipment->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="model_number" class="block text-gray-700 text-sm font-bold mb-2">型番形式</label>
            <input type="text" name="model_number" id="model_number" value="{{ $equipment->model }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="manufacturer" class="block text-gray-700 text-sm font-bold mb-2">メーカー</label>
            <input type="text" name="manufacturer" id="manufacturer" value="{{ $equipment->manufacturer }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
          <label for="fuel_type" class="block text-gray-700 text-sm font-bold mb-2">燃料種別</label>
          <input type="text" name="fuel_type" id="fuel_type" value="{{ $equipment->fuel_type }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
          <label for="acquisition_date" class="block text-gray-700 text-sm font-bold mb-2">取得日</label>
          <input type="text" name="acquisition_date" id="acquisition_date" value="{{ $equipment->acquisition_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
          <label for="unit_price" class="block text-gray-700 text-sm font-bold mb-2">取得金額</label>
          <input type="text" name="unit_price" id="unit_price" value="{{ $equipment->unit_price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>



        <div class="flex items-center justify-between">
            <button type="submit" class="btn btn-primary">
                更新
            </button>
            <a href="{{ route('ledger.equipment.index') }}" class="btn btn-secondary">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
