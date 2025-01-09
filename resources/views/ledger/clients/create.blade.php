@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">取引先の登録</h1>

    <form action="{{ route('ledger.clients.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="official_name">正式名称</label>
            <input type="text" name="official_name" id="official_name" placeholder="例: 株式会社サンプル" class="form-input">
        </div>

        <div class="form-group">
            <label for="kana">よみがな</label>
            <input type="text" name="kana" id="kana" placeholder="例: かぶしきがいしゃさんぷる" class="form-input">
        </div>

        <div class="form-group">
            <label for="app_registered_name">アプリ内登録名</label>
            <input type="text" name="app_registered_name" id="app_registered_name" placeholder="例: サンプル取引先" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
