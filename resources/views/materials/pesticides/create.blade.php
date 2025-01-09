@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">農薬登録</h1>

    {{-- バリデーションエラーの表示 --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.pesticides.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        {{-- 農薬名 --}}
        <div class="mb-4">
            <label for="pesticideSearch" class="block text-gray-700 text-sm font-bold mb-2">農薬名</label>
            <input type="text" 
                   name="name" 
                   id="pesticideSearch" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" 
                   value="{{ old('name') }}"
                   required>
        </div>

        {{-- 有効成分 --}}
        <div class="mb-4">
            <label for="active_ingredient" class="block text-gray-700 text-sm font-bold mb-2">有効成分</label>
            <input type="text" 
                   name="active_ingredient" 
                   id="active_ingredient"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                   value="{{ old('active_ingredient') }}">
        </div>

        {{-- 購入日 --}}
        <div class="mb-4">
            <label for="purchase_date" class="block text-gray-700 text-sm font-bold mb-2">購入日</label>
            <input type="date" 
                   name="purchase_date" 
                   id="purchase_date"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                   value="{{ old('purchase_date') }}">
        </div>

        {{-- 数量 --}}
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">数量</label>
            <input type="number" 
                   name="quantity" 
                   id="quantity"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" 
                   value="{{ old('quantity') }}"
                   required>
        </div>

        {{-- 使用量 --}}
        <div class="mb-4">
            <label for="application_rate" class="block text-gray-700 text-sm font-bold mb-2">使用量</label>
            <input type="number" 
                   step="0.01"
                   name="application_rate" 
                   id="application_rate"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                   value="{{ old('application_rate') }}">
        </div>

        {{-- ロット番号 --}}
        <div class="mb-4">
            <label for="lot_number" class="block text-gray-700 text-sm font-bold mb-2">ロット番号</label>
            <input type="text" 
                   name="lot_number" 
                   id="lot_number"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                   value="{{ old('lot_number') }}">
        </div>

        <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            登録
        </button>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    $('#pesticideSearch').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '/pesticides/search-by-wagri',
                data: { q: request.term },
                success: function(data) {
                    // data = [ { id, text }, ... ] を
                    // jQuery UI Autocomplete形式 { label, value } に変換
                    let results = data.map(item => {
                        return {
                            label: item.text,
                            value: item.text
                        };
                    });
                    response(results);
                }
            });
        },
        minLength: 2
    });
});
</script>
@endpush
