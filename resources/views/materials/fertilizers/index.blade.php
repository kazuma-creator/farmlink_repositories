@extends('layouts.app')

@section('content')
<div class="contaienr mx-auto px-4">
  <h1 class="text-2xl font-bold mb-6">肥料一覧</h1>

  <table class="table-auto w-full border">
    <thead>
      <tr class="bg-gray-200">
        <th class="px-4 py-2">肥料名</th>
        <th class="px-4 py-2">含有成分</th>
        <th class="px-4 py-2">購入日</th>
        <th class="px-4 py-2">数量</th>
        <th class="px-4 py-2">使用量</th>
        <th class="px-4 py-2">ロット番号</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($fertilizers as $fertilizer)
        <tr>
          <td class="border px-4 py-2">{{ $fertilizer->name }}</td>
          <td class="border px-4 py-2">{{ $fertilizer->nutrient ?? 'なし' }}</td>
          <td class="border px-4 py-2">{{ $fertilizer->purchase_date ?? 'なし' }}</td>
          <td class="border px-4 py-2">{{ $fertilizer->quantity }}</td>
          <td class="border px-4 py-2">{{ $fertilizer->application_rate ?? 'なし' }}</td>
          <td class="border px-4 py-2">{{ $fertilizer->lot_number ?? 'なし' }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center py-4">登録された肥料がありません。</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  <a href="{{route('materials.fertilizers.create')}}" class="bg-green-500 text-black px-4 py-2 rounded mt-4 inline-block">新規登録</a>
</div>
@endsection