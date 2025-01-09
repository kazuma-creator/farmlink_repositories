@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作業編集</h1>

    <form action="{{ route('ledger.tasks.update', $task->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="crop_name" class="block text-gray-700 text-sm font-bold mb-2">作物名</label>
            <select name="crop_name" id="crop_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="" disabled>作物を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->crop_name }}" {{ $item->crop_name == $task->crop_name ? 'selected' : '' }}>
                        {{ $item->crop_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="task_name" class="block text-gray-700 text-sm font-bold mb-2">作業名</label>
            <input type="text" name="task_name" id="task_name" value="{{ $task->task_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                更新
            </button>
            <a href="{{ route('ledger.tasks.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
