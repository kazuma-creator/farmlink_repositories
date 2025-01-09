@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">機械設備の登録</h1>

    <form action="{{ route('ledger.equipment.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="name">機械設備名</label>
            <input type="text" name="name" id="name" placeholder="例: トラクター" class="form-input">
        </div>

        <div class="form-group">
            <label for="model">型番形式</label>
            <input type="text" name="model" id="model" placeholder="例: TX-500" class="form-input">
        </div>

        <div class="form-group">
            <label for="manufacturer">メーカー</label>
            <input type="text" name="manufacturer" id="manufacturer" placeholder="例: 株式会社ヤマト" class="form-input">
        </div>

        <div class="form-group">
            <label for="fuel_type">燃料の種類</label>
            <input type="text" name="fuel_type" id="fuel_type" placeholder="例: 軽油" class="form-input">
        </div>

        <div class="form-group">
            <label for="acquisition_date">取得日</label>
            <input type="date" name="acquisition_date" id="acquisition_date" class="form-input">
        </div>

        <div class="form-group">
            <label for="unit_price">取引単価</label>
            <input type="number" step="0.01" name="unit_price" id="unit_price" placeholder="例: 500000.00" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
