@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">肥料一覧</h1>

    {{-- 登録ボタン --}}
    <div class="mb-4">
        <a href="{{ route('record.fertilizer.create') }}" class="btn btn-success">
            新規肥料登録
        </a>
    </div>

    {{-- 一覧表 --}}
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">日付</th>
                <th class="border px-4 py-2">作付名</th>
                <th class="border px-4 py-2">圃場名</th>
                <th class="border px-4 py-2">肥料名</th>
                <th class="border px-4 py-2">使用量</th>
                <th class="border px-4 py-2">単位</th>
                <th class="border px-4 py-2">作業員</th>
                <th class="border px-4 py-2">使用機械</th>
                <th class="border px-4 py-2">メモ</th>
                {{-- 編集や削除ボタンも必要なら追加 --}}
            </tr>
        </thead>
        <tbody>
            @forelse($fertilizers as $fertilizer)
                <tr>
                    <td class="border px-4 py-2">{{ $fertilizer->date }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->cropping->name }}</td>
                    
                    <td class="border px-4 py-2">{{ $fertilizer->memo }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border px-4 py-2 text-center">出荷データがありません</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
