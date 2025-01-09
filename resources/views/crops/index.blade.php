@extends('layouts.app')

@section('content')
<div class="crop-management-body">
    <div class="crop-management-container">
        <div class="crop-management-content">
            <div class="crop-management-header">
                <h1 class="custom-font">農作物一覧</h1>
                <a href="{{ route('crops.create') }}" class="create-button bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">新規農作物を登録</a>
            </div>

            <div class="search-bar">
                <form action="{{ route('crops.index') }}" method="GET">
                    <div>
                        <input type="text" id="search-input" name="search" placeholder="検索キーワードを入力" value="{{ request('search') }}">
                    </div>
                </form>
            </div>
        

            @if (session('success'))
                <div class="crop-management-success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="crop-manager">
                <table class="crop-management-table">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th>品種名</th>
                            <th>栽培方法</th>
                            <!-- <th>肥料情報</th>
                            <th>農薬情報</th>
                            <th>説明</th>
                            <th>おすすめの調理法</th> -->
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crops as $crop)
                            <tr>
                                <td>{{ $crop->product_name }}</td>
                                <td>{{ $crop->name }}</td>
                                <td>{{ $crop->cultivation_method }}</td>
                                <!-- <td>{{ $crop->fertilizer_info }}</td>
                                <td>{{ $crop->pesticide_info }}</td>
                                <td>{{ $crop->description }}</td>
                                <td>{{ $crop->cooking_tips }}</td> -->
                                <td class="crop-management-action-buttons">
                                    <a href="{{ route('crops.edit', $crop->id) }}" class="btn btn-outline-success">編集</a>
                                    <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    </form>
                                    @if ($crop->qr_code_path)
                                        <a href="{{ asset('storage/' . $crop->qr_code_path) }}" target="_blank" class="btn btn-outline-secondary">QRコードを表示</a>
                                    @else
                                        <form action="{{ route('qr.store', ['crop' => $crop->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary">QRコードを生成</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-links">
                {{ $crops->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>
@endsection
