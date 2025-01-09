@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">商品一覧</h1>
    </div>

    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>品目</th>
                    <th>包装容器</th>
                    <th>入数</th>
                    <th>出荷単位重量</th>
                    <th>単価</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->item->crop_name }}</td>
                        <td>{{ $product->packaging }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->unit_weight }} {{ $product->unit }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('ledger.products.edit', $product->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    

    <div class="ledger-actions">
        <a href="{{ route('ledger.products.create') }}" class="btn-success">
            新規商品登録
        </a>
    </div>
</div>
@endsection
