@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">床土一覧</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">品名</th>
                <th class="px-4 py-2">購入日/棚卸日</th>
                <th class="px-4 py-2">内容量</th>
                <th class="px-4 py-2">数量</th>
                <th class="px-4 py-2">購入金額</th>
                <th class="px-4 py-2">購入先</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($soils as $soil)
                <tr>
                    <td class="border px-4 py-2">{{ $soil->name }}</td>
                    <td class="border px-4 py-2">{{ $soil->purchased_date ?? 'なし' }}</td>
                    <td class="border px-4 py-2">{{ $soil->content_volume ?? 'なし' }} {{ $soil->unit ?? '' }}</td>
                    <td class="border px-4 py-2">{{ $soil->quantity }}</td>
                    <td class="border px-4 py-2">{{ $soil->purchase_price ? '¥' . number_format($soil->purchase_price, 2) : 'なし' }}</td>
                    <td class="border px-4 py-2">{{ $soil->supplier ?? 'なし' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">登録された床土がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('materials.soils.create') }}" class="bg-green-500 text-black px-4 py-2 rounded mt-4 inline-block">新規登録</a>
</div>
@endsection
