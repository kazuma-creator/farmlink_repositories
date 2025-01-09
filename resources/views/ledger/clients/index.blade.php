@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">取引先一覧</h1>
    </div>
    
    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>正式名称</th>
                    <th>よみがな</th>
                    <th>アプリ内登録名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->official_name }}</td>
                        <td>{{ $client->kana }}</td>
                        <td>{{ $client->app_registered_name }}</td>
                        <td>
                            <a href="{{ route('ledger.clients.edit', $client->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    <div class="ledger-actions">
        <a href="{{ route('ledger.clients.create') }}" class="btn-success">
            新規取引先登録
        </a>
    </div>
</div>
@endsection
