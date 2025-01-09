@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">収穫記録一覧</h1>
    <div class="mb-4">
        <a href="{{ route('record.harvest.create') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
            新規収穫記録を追加
        </a>
    </div>

    @if($harvests->isEmpty())
        <p class="text-gray-700">登録された収穫記録がありません。</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">日付</th>
                    <th class="border px-4 py-2">作付名</th>
                    <th class="border px-4 py-2">合計収量</th>
                    <th class="border px-4 py-2">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($harvests as $harvest)
                    <tr>
                        <td class="border px-4 py-2">{{ $harvest->harvest_date }}</td>
                        <td class="border px-4 py-2">{{ $harvest->cropping->name }}</td>
                        <td class="border px-4 py-2">{{ $harvest->total_yield }}{{ $harvest->yield_units}}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('record.harvest.edit', $harvest->id) }}" class="text-blue-500 hover:underline">編集</a>
                            <form action="{{ route('record.harvest.destroy', $harvest->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
