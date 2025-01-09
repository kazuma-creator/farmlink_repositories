@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
  <h1 class="text-2x1 font-bold mb-6">資材一覧</h1>

  <table class="table-auto w-full border">
    <thead>
      <tr class="bg-gray-200">
        <th class="px-4 py-2">品名</th>
        <th class="px-4 py-2">購入日または棚卸日</th>
        <th class="px-4 py-2">内容量</th>
        <th class="px-4 py-2">数量</th>
        <th class="px-4 py-2">購入金額</th>
        <th class="px-4 py-2">購入先</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($materials as $material)
      <tr>
        <td class="border px-4 py-2">{{ $material->name }}</td>
        <td class="border px-4 py-2">{{ $material->purchased_date ?? 'なし' }}</td>
        <td class="border px-4 py-2">{{ $material->content_volume ?? 'なし' }} {{ $material->unit ?? '' }}</td>
        <td class="border px-4 py-2">{{ $material->quantity }}</td>
        <td class="border px-4 py-2">{{ $material->purchase_price ? '¥' . number_format($material->purchase_price, 2) : 'なし' }}</td>
        <td class="border px-4 py-2">{{ $material->supplier ?? 'なし' }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="text-center py-4">登録された資材がありません。</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  <a href="{{route('materials.materials.create')}}" class="btn btn-success">新規登録</a>
</div>