@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">農薬一覧</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">農薬名</th>
                <th class="px-4 py-2">有効成分</th>
                <th class="px-4 py-2">購入日</th>
                <th class="px-4 py-2">数量</th>
                <th class="px-4 py-2">使用量</th>
                <th class="px-4 py-2">ロット番号</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pesticides as $pesticide)
                <tr>
                    <td class="border px-4 py-2">{{ $pesticide->name }}</td>
                    <td class="border px-4 py-2">{{ $pesticide->active_ingredient ?? 'なし' }}</td>
                    <td class="border px-4 py-2">{{ $pesticide->purchase_date ?? 'なし' }}</td>
                    <td class="border px-4 py-2">{{ $pesticide->quantity }}</td>
                    <td class="border px-4 py-2">{{ $pesticide->application_rate ?? 'なし' }}</td>
                    <td class="border px-4 py-2">{{ $pesticide->lot_number ?? 'なし' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">登録された農薬がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('materials.pesticides.create') }}" class="btn btn-success">新規登録</a>
</div>
@endsection
