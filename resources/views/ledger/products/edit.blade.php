@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">商品編集</h1>

    <form action="{{ route('ledger.products.update', $product->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="item_id" class="block text-gray-700 text-sm font-bold mb-2">品目</label>
            <select name="item_id" id="item_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="" disabled>品目を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $product->item_id ? 'selected' : '' }}>
                        {{ $item->crop_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 商品名 --}}
        <div class="mb-4">
            <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">商品名</label>
            <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        
        <div class="mb-4">
            <label for="packaging" class="block text-gray-700 text-sm font-bold mb-2">包装容器</label>
            <input type="text" name="packaging" id="packaging" value="{{ $product->packaging }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">入数</label>
            <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="unit_weight" class="block text-gray-700 text-sm font-bold mb-2">出荷単位重量</label>
            <div class="flex">
                <input type="number" name="unit_weight" id="unit_weight" value="{{ $product->unit_weight }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <select name="unit" id="unit" class="ml-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="kg" {{ $product->unit == 'kg' ? 'selected' : '' }}>kg</option>
                    <option value="g" {{ $product->unit == 'g' ? 'selected' : '' }}>g</option>
                    <option value="L" {{ $product->unit == 'L' ? 'selected' : '' }}>L</option>
                    <option value="mL" {{ $product->unit == 'mL' ? 'selected' : '' }}>mL</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">単価</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="btn btn-primary">
                更新
            </button>
            <a href="{{ route('ledger.products.index') }}" class="btn btn-secondary">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
