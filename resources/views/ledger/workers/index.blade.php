@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">作業員一覧</h1>
    </div>
    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>フリガナ</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workers as $worker)
                    <tr>
                        <td>{{ $worker->id }}</td>
                        <td>{{ $worker->name }}</td>
                        <td>{{ $worker->kana }}</td>
                        <td>
                            <a href="{{ route('ledger.workers.edit', $worker->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="ledger-actions">
        <a href="{{ route('ledger.workers.create') }}" class="btn-success">
            新規作業員登録
        </a>
    </div>
</div>
@endsection
