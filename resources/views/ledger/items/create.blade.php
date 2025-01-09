@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">品目の登録</h1>

    <form action="{{ route('ledger.items.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="crop_name">作物名</label>
            <input type="text" name="crop_name" id="crop_name" placeholder="例: トマト" class="form-input">
        </div>

        <div class="form-group">
            <label for="variety_name">品種名</label>
            <input type="text" name="variety_name" id="variety_name" placeholder="例: 桃太郎" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
