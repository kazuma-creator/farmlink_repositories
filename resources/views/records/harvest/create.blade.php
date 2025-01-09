@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">収穫記録の新規登録</h1>

    <form action="{{ route('record.harvest.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="harvest_date" class="block text-gray-700 text-sm font-bold mb-2">日付</label>
            <input type="date" name="harvest_date" id="harvest_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="cropping_id" class="block text-gray-700 text-sm font-bold mb-2">作付名</label>
            <select name="cropping_id" id="cropping_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="" disabled selected>作付名を選択してください</option>
                @foreach ($croppings as $cropping)
                    <option value="{{ $cropping->id }}">{{ $cropping->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- 収穫ロット情報の表示 -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">収穫ロット</label>
            <button type="button" id="addLotButton" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4">
                ロットを追加
            </button>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">圃場名</th>
                        <th class="border border-gray-300 px-4 py-2">数量</th>
                        <th class="border border-gray-300 px-4 py-2">単位</th>
                    </tr>
                </thead>
                <tbody id="lotTableBody">
                    <tr>
                      <td>圃場名</td>
                      <td>数量</td>
                      <td>単位</td>

                      <input type="hidden" name="lots[0][field_id]" value="1">
                      <input type="hidden" name="lots[0][quantity]" value="10">
                      <input type="hidden" name="lots[0][unit]" value="kg">
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- 作業員 --}}
        <div class="mb-4">
          <label for="worker_id" class="block text-gray-700 text-sm font-bold mb-2">作業員</label>
          <select name="worker_id" id="worker_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="" disabled selected>作業員を選択してください</option>
            @foreach ($workers as $worker)
              <option value="{{ $worker->id }}">{{ $worker->name }}</option>
            @endforeach
          </select>
        </div>

        {{--使用機器--}}
        <div class="mb-4">
          <label for="equipment_id" class="block text-gray-700 text-sm font-bold mb-2">使用機器</label>
          <select name="lots[0][equipment_id]" id="equipment_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            <option value="" disabled selected>使用機器を選択してください</option>
            @foreach ($equipments as $equipment)
              <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
            @endforeach
          </select>
        </div>

        {{-- メモ --}}
        <div class="mb-4">
            <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">メモ</label>
            <textarea name="notes" id="notes" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                登録
            </button>
        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const lotTableBody = document.getElementById('lotTableBody');

        // ロット追加ボタンで新しいウィンドウを開く
        document.getElementById('addLotButton').addEventListener('click', () => {
            window.open('{{ route('record.harvest.lot.create') }}', '_blank', 'width=600,height=400');
        });

        // サブウィンドウからのメッセージを受け取る
        window.addEventListener('message', (event) => {
            const lotData = event.data;

            // ロット情報をテーブルに追加
            const newRow = `
                <tr>
                    <td class="border border-gray-300 px-4 py-2">${lotData.fieldName}</td>
                    <td class="border border-gray-300 px-4 py-2">${lotData.quantity}</td>
                    <td class="border border-gray-300 px-4 py-2">${lotData.unit}</td>
                </tr>
            `;
            lotTableBody.insertAdjacentHTML('beforeend', newRow);
        });
    });
</script>
