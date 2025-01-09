@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">品目を選択</h1>

    <!-- +ボタン -->
    <div class="mb-4">
        <a href="{{ route('ledger.items') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            + 品目を登録
        </a>
    </div>

    <!-- 品目一覧表示 -->
    <table class="table-auto w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-green-500 text-white">
                <th class="px-4 py-2">品目名</th>
                <th class="px-4 py-2">品種名</th>
                <th class="px-4 py-2">選択</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $item->crop_name }}</td>
                    <td class="px-4 py-2">{{ $item->variety_name }}</td>
                    <td class="px-4 py-2">
                        <a 
                            href="{{ route('cropping.create', ['item_id' => $item->id, 'item_name' => $item->crop_name . ' ' . $item->variety_name]) }}" 
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-1 px-2 rounded">
                            選択
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">登録された品目がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function selectItem(id, name) {
        // 作付登録画面に値を返す処理
        alert(`品目 "${name}" が選択されました。`);
        // 必要に応じてウィンドウを閉じる、または画面を遷移
    }
</script>
@endsection
