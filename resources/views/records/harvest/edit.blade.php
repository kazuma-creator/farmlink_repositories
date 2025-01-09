@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">収穫記録の編集</h1>

    <form action="{{ route('record.harvest.update', $harvest->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">日付</label>
            <input type="date" name="date" id="date" value="{{ $harvest->date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="cropping_id" class="block text-gray-700 text-sm font-bold mb-2">作付名</label>
            <select name="cropping_id" id="cropping_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach ($croppings as $cropping)
                    <option value="{{ $cropping->id }}" {{ $harvest->cropping_id == $cropping->id ? 'selected' : '' }}>{{ $cropping->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="lot_number" class="block text-gray-700 text-sm font-bold mb-2">収穫ロット</label>
            <input type="text" name="lot_number" id="lot_number" value="{{ $harvest->lot_number }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">メモ</label>
            <textarea name="notes" id="notes" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $harvest->notes }}</textarea>
        </div>

        <div class="mb-4">
            <label for="images" class="block text-gray-700 text-sm font-bold mb-2">写真画像</label>
            <input type="file" name="images[]" id="images" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                更新
            </button>
        </div>
    </form>
</div>
@endsection
