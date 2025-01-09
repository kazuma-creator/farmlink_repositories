@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <img src="{{ asset('images/ボードアイコン.png') }}" alt="Icon" class="title-icon">
        <h1 class="ledger-title">圃場一覧</h1>
    </div>
    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>圃場名</th>
                    <th>面積</th>
                    <th>単位</th>
                    <th>所有/借地</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $field)
                <tr>
                    <td>{{ $field->id }}</td>
                    <td>{{ $field->name }}</td>
                    <td>{{ $field->area }}</td>
                    <td>{{ $field->area_unit }}</td>
                    <td>{{ $field->ownership }}</td>
                    <td>
                        <a href="{{ route('ledger.fields.edit', $field->id) }}" class="btn-primary">編集</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="ledger-actions">
        <a href="{{ route('ledger.fields.create') }}" class="btn-success">新規圃場登録</a>
    </div>
</div>
@endsection

