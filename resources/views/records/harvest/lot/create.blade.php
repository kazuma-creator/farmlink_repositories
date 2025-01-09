@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">収穫ロットの登録</h1>

    <form id="lotForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="field_id" class="block text-gray-700 text-sm font-bold mb-2">圃場</label>
            <select name="field_id" id="field_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                <option value="" disabled selected>圃場を選択してください</option>
                @foreach ($fields as $field)
                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">数量</label>
            <input type="number" name="quantity" id="quantity" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div class="mb-4">
            <label for="unit" class="block text-gray-700 text-sm font-bold mb-2">単位</label>
            <input type="text" name="unit" id="unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="button" id="submitLotButton" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                ロットを追加
            </button>
        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('submitLotButton').addEventListener('click', () => {
            const fieldId = document.getElementById('field_id').value;
            const quantity = document.getElementById('quantity').value;
            const unit = document.getElementById('unit').value;

            if (fieldId && quantity && unit) {
                const lotData = {
                    fieldName: document.querySelector(`#field_id option[value="${fieldId}"]`).textContent,
                    quantity: quantity,
                    unit: unit,
                };

                // 親ウィンドウにデータを送信
                window.opener.postMessage(lotData, '*');
                window.close();
            }
        });
    });
</script>
