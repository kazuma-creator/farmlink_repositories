@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">出荷登録</h1>

    {{-- バリデーションエラーなどの表示例 --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('record.shipment.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        {{-- 日付 --}}
        <div class="mb-4">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">日付</label>
            <input type="date" name="date" id="date"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   value="{{ old('date') }}"
                   required>
        </div>

        {{-- 取引先 (client_id) --}}
        <div class="mb-4">
            <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">取引先</label>
            <select name="client_id" id="client_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                <option value="" disabled selected>選択してください</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}"
                        {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->official_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 出荷品名 (cropping_id or product_id) --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">出荷品名</label>
            
            <div class="mb-2">
                <select name="cropping_id" id="cropping_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" selected>作付名を選択してください</option>
                    @foreach ($croppings as $cropping)
                        <option value="{{ $cropping->id }}"
                            {{ old('cropping_id') == $cropping->id ? 'selected' : '' }}>
                            {{ $cropping->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <label class="block text-gray-700 text-sm font-bold mb-2">商品名</label>
            <div class="mb-2">
                <select name="product_id" id="product_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" selected>商品を選択してください</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->product_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
        </div>

        {{-- 単価 (unit_price) --}}
        <div class="mb-4">
            <label for="unit_price" class="block text-gray-700 text-sm font-bold mb-2">単価</label>
            <input type="number" step="0.01" name="unit_price" id="unit_price"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   value="{{ old('unit_price', 0) }}"
                   required>
        </div>

        {{-- 数量 (quantity) --}}
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">数量</label>
            <input type="number" step="0.01" name="quantity" id="quantity"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   value="{{ old('quantity', 0) }}"
                   required>
        </div>

        {{-- メモ (memo) --}}
        <div class="mb-4">
            <label for="memo" class="block text-gray-700 text-sm font-bold mb-2">メモ</label>
            <textarea name="memo" id="memo" rows="4"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('memo') }}</textarea>
        </div>

        {{-- 登録ボタン --}}
        <div class="flex items-center justify-between">
            <button type="submit"
                    class="btn btn-success">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
