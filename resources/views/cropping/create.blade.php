@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作付を作成</h1>

    <form action="{{ route('cropping.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">作付名</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- 品目選択ボタン -->
        <div class="mb-4">
            <label for="item_id" class="block text-gray-700 text-sm font-bold mb-2">品目</label>
            <div class="flex items-center">
                <input type="hidden" name="item_id" id="item_id" value="{{ old('item_id', request('item_id')) }}">
                <span id="selected_item_name" class="text-gray-600 italic">
                    {{ request('item_name', '未選択') }}
                </span>
                <a href="{{ route('items.select', ['redirect_to' => route('cropping.create')]) }}" class="ml-4 text-blue-500 underline">品目を選択する</a>
            </div>
        </div>
                
        <div class="mb-4">
            <label for="field" class="block text-gray-700 text-sm font-bold mb-2">作付圃場</label>
            <select name="field_id" id="field" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @foreach ($fields as $field)
                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="planting_date" class="block text-gray-700 text-sm font-bold mb-2">播種または定植日</label>
            <input type="date" name="planting_date" id="planting_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label for="expected_yield" class="block text-gray-700 text-sm font-bold mb-2">収穫見込量</label>
            <input type="number" name="expected_yield" id="expected_yield" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            <select name="yield_unit" id="yield_unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                <option value="kg">kg</option>
                <option value="t">t</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">カラー</label>
            <input type="color" name="color" id="color" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
