@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">機械設備一覧</h1>
    </div>

    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>機械設備名</th>
                    <th>型番形式</th>
                    <th>メーカー</th>
                    <th>燃料種別</th>
                    <th>取得日</th>
                    <th>取得価格</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipment as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->model }}</td>
                        <td>{{ $item->manufacturer }}</td>
                        <td>{{ $item->fuel_type }}</td>
                        <td>{{ $item->acquisition_date }}</td>
                        <td>{{ $item->unit_price }}</td>
                        <td>
                            <a href="{{ route('ledger.equipment.edit', $item->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="ledger-actions">
        <a href="{{ route('ledger.equipment.create') }}" class="btn-success">
            新規機械設備登録
        </a>
    </div>
</div>
@endsection
