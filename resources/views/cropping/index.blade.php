@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作付一覧</h1>

    <!-- + ボタン -->
    <div class="mb-4">
        <a href="{{ route('cropping.create') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
            + 作付を作成
        </a>
    </div>

    <!-- 作付一覧表示 -->
    <table class="table-auto w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-green-500 text-white">
                <th class="px-4 py-2">作付名</th>
                <th class="px-4 py-2">品目名</th>
                <th class="px-4 py-2">圃場名</th>
                <th class="px-4 py-2">播種/定植日</th>
                <th class="px-4 py-2">色</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($croppings as $cropping)
                <tr class="border-t">
                    <!-- 作付名 -->
                    <td class="px-4 py-2">{{ $cropping->name }}</td>

                    <!-- 品目名 -->
                    <td class="px-4 py-2">
                        {{ $cropping->item->crop_name }} {{ $cropping->item->variety_name }}
                    </td>

                    <!-- 圃場名 -->
                    <td class="px-4 py-2">{{ $cropping->field->name }}</td>

                    <!-- 播種/定植日 -->
                    <td class="px-4 py-2">{{ $cropping->planting_date }}</td>

                    <!-- 色 -->
                    <td class="px-4 py-2">
                        <span 
                            class="inline-block w-6 h-6 rounded-full" 
                            style="background-color: {{ $cropping->color }};">
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">登録された作付がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
