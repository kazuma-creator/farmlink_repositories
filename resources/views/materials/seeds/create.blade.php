@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">種苗を登録</h1>

    <form action="{{ route('materials.seeds.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="item_id" class="block text-gray-700 text-sm font-bold mb-2">品目</label>
            <select name="item_id" id="item_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->crop_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="purchase_date" class="block text-gray-700 text-sm font-bold mb-2">購入日/棚卸日</label>
            <input type="date" name="purchase_date" id="purchase_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="mb-4">
            <label for="content_volume" class="block text-gray-700 text-sm font-bold mb-2">内容量</label>
            <input type="number" name="content_volume" id="content_volume" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">数量</label>
            <input type="number" name="quantity" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        <div class="mb-4">
            <label for="expiry_date" class="block text-gray-700 text-sm font-bold mb-2">有効期限</label>
            <input type="date" name="expiry_date" id="expiry_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>
        <div class="mb-4">
            <label for="lot_number" class="block text-gray-700 text-sm font-bold mb-2">ロット番号</label>
            <input type="text" name="lot_number" id="lot_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
