@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">圃場の登録</h1>

    <form action="{{ route('ledger.fields.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="type">種別</label>
            <select name="type" id="type" class="form-select">
                <option value="露地">露地</option>
                <option value="施設">施設</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">名称</label>
            <input type="text" name="name" id="name" placeholder="例: 圃場A" class="form-input">
        </div>

        <div class="form-group">
            <label for="area">面積</label>
            <input type="number" step="0.01" name="area" id="area" placeholder="例: 100.5" class="form-input">
        </div>

        <div class="form-group">
            <label for="area_unit">単位</label>
            <select name="area_unit" id="area_unit" class="form-select">
                <option value="a">a</option>
                <option value="反">反</option>
                <option value="m²">m²</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ownership">所有/借地</label>
            <select name="ownership" id="ownership" class="form-select">
                <option value="所有">所有</option>
                <option value="借地">借地</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection

    