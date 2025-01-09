@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">作業一覧</h1>
    </div>

    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>作物名</th>
                    <th>作業名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->crop_name }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>
                            <a href="{{ route('ledger.tasks.edit', $task->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    <div class="ledger-actions">
        <a href="{{ route('ledger.tasks.create') }}" class="btn-success">
            新規作業登録
        </a>
    </div>
</div>
@endsection
