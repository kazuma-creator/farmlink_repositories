@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">作業登録</h1>

    <form action="{{ route('ledger.tasks.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="crop_name">作物名</label>
            <select name="crop_name" id="crop_name" class="form-select">
                <option value="" disabled selected>作物を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->crop_name }}">{{ $item->crop_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="task_name">作業名</label>
            <input type="text" name="task_name" id="task_name" placeholder="例: 播種" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-success">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
