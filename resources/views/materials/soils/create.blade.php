@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">床土登録</h1>

    <form action="{{ route('materials.soils.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">品名</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div class="mb-4">
            <label for="purchased_date" class="block text-gray-700 text-sm font-bold mb-2">購入日または棚卸日</label>
            <input type="date" name="purchased_date" id="purchased_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label for="content_volume" class="block text-gray-700 text-sm font-bold mb-2">内容量</label>
            <input type="number" step="0.01" name="content_volume" id="content_volume" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label for="unit" class="block text-gray-700 text-sm font-bold mb-2">単位</label>
            <select name="unit" id="unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                <option value="kg">kg</option>
                <option value="g">g</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">数量</label>
            <input type="number" name="quantity" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div class="mb-4">
            <label for="purchase_price" class="block text-gray-700 text-sm font-bold mb-2">購入金額</label>
            <input type="number" step="0.01" name="purchase_price" id="purchase_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label for="supplier" class="block text-gray-700 text-sm font-bold mb-2">購入先</label>
            <input type="text" name="supplier" id="supplier" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded">登録</button>
    </form>
    {{-- @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
</div>
@endsection
