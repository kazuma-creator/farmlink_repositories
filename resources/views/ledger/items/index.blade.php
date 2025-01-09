@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">品目一覧</h1>
    </div>
    
    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>作物名</th>
                    <th>品種名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->crop_name }}</td>
                    <td>{{ $item->variety_name }}</td>
                    <td>
                        <a href="{{ route('ledger.items.edit', $item->id) }}" class="btn-primary">編集</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="ledger-actions">
        <a href="{{ route('ledger.items.create') }}" class="btn-success">新規品目登録</a>
    </div>
</div>
@endsection
