@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">作業員の登録</h1>

    <form action="{{ route('ledger.workers.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" name="name" id="name" placeholder="例: 山田 太郎" class="form-input">
        </div>

        <div class="form-group">
            <label for="kana">よみがな</label>
            <input type="text" name="kana" id="kana" placeholder="例: やまだ たろう" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
