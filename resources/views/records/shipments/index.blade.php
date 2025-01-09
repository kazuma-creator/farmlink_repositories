@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">出荷一覧</h1>

    {{-- 登録ボタン --}}
    <div class="mb-4">
        <a href="{{ route('record.shipment.create') }}" class="btn btn-success">
            新規出荷登録
        </a>
    </div>

    {{-- 一覧表 --}}
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">日付</th>
                <th class="border px-4 py-2">取引先</th>
                <th class="border px-4 py-2">出荷品</th>
                <th class="border px-4 py-2">単価</th>
                <th class="border px-4 py-2">数量</th>
                <th class="border px-4 py-2">メモ</th>
                {{-- 編集や削除ボタンも必要なら追加 --}}
            </tr>
        </thead>
        <tbody>
            @forelse($shipments as $shipment)
                <tr>
                    <td class="border px-4 py-2">{{ $shipment->date }}</td>
                    <td class="border px-4 py-2">{{ optional($shipment->client)->official_name }}</td>
                    <td class="border px-4 py-2">
                        {{-- 作付名 or 商品名 --}}
                        @if ($shipment->cropping)
                            {{ $shipment->cropping->name }}
                        @elseif ($shipment->product)
                            {{ $shipment->product->product_name }}
                        @else
                            なし
                        @endif
                    </td>
                    <td class="border px-4 py-2 text-right">{{ $shipment->unit_price }}</td>
                    <td class="border px-4 py-2 text-right">{{ $shipment->quantity }}</td>
                    <td class="border px-4 py-2">{{ $shipment->memo }}</td>
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
