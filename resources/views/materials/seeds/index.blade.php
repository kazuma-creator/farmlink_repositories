@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">種苗一覧</h1>

    <div class="mb-4">
        <a href="{{ route('materials.seeds.create') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
            + 種苗を登録
        </a>
    </div>

    <table class="table-auto w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-green-500 text-black">
                <th class="px-4 py-2">品目</th>
                <th class="px-4 py-2">購入日/棚卸日</th>
                <th class="px-4 py-2">内容量</th>
                <th class="px-4 py-2">数量</th>
                <th class="px-4 py-2">有効期限</th>
                <th class="px-4 py-2">ロット番号</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($seeds as $seed)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $seed->item->crop_name }}</td>
                    <td class="px-4 py-2">{{ $seed->purchase_date ?? 'なし'}}</td>
                    <td class="px-4 py-2">{{ $seed->content_volume ?? 'なし'}}</td>
                    <td class="px-4 py-2">{{ $seed->quantity }}</td>
                    <td class="px-4 py-2">{{ $seed->expiry_date ?? 'なし' }}</td>
                    <td class="px-4 py-2">{{ $seed->lot_number ?? 'なし' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">登録された種苗がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
