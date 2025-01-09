@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">圃場を選択</h1>

    <!-- +ボタン -->
    <div class="mb-4">
        <a href="{{ route('ledger.fields') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            + 圃場を登録
        </a>
    </div>

    <!-- 圃場一覧表示 -->
    <table class="table-auto w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-green-500 text-white">
                <th class="px-4 py-2">圃場名</th>
                <th class="px-4 py-2">種別</th>
                <th class="px-4 py-2">面積</th>
                <th class="px-4 py-2">選択</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fields as $field)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $field->name }}</td>
                    <td class="px-4 py-2">{{ $field->type }}</td>
                    <td class="px-4 py-2">{{ $field->area }} {{ $field->area_unit }}</td>
                    <td class="px-4 py-2">
                        <button 
                            onclick="selectField({{ $field->id }}, '{{ $field->name }}')" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                            選択
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">登録された圃場がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function selectField(id, name) {
        // 作付登録画面に値を返す処理
        alert(`圃場 "${name}" が選択されました。`);
        // 必要に応じてウィンドウを閉じる、または画面を遷移
    }
</script>
@endsection
