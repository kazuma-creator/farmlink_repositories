@extends('layouts.app')

@section('content')
<div class="container">
    <h1>作業員編集</h1>
    <form action="{{ route('ledger.workers.update', $worker->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">名前</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $worker->name }}" required>
        </div>
        <div class="mb-3">
            <label for="kana" class="form-label">フリガナ</label>
            <input type="text" name="kana" id="kana" class="form-control" value="{{ $worker->kana }}" required>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
