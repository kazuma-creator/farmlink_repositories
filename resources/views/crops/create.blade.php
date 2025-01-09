@extends('layouts.app')

@section('content')
<div class="crop-body">
    <div class="crop-container">
        <div class="crop-content">
            <h1 class="crop-header">新規農作物の登録</h1>
            <form action="{{ route('crops.store') }}" method="POST" enctype="multipart/form-data" class="form-design">
                @csrf
                <div class="crop-form-group">
                    <label for="product_name" class="crop-form-label">商品名</label>
                    <input type="text" class="crop-form-control" id="product_name" name="product_name" required>
                </div>
                <div class="crop-form-group">
                    <label for="name" class="crop-form-label">品種名</label>
                    <input type="text" class="crop-form-control" id="name" name="name" required>
                </div>
                <div class="crop-form-group">
                    <label for="cultivation_method" class="crop-form-label">栽培方法</label>
                    <select class="crop-form-control" id="cultivation_method" name="cultivation_method" required>
                        <option value="">栽培方法を選択してください</option>
                        <option value="有機栽培">有機栽培</option>
                        <option value="特別栽培">特別栽培</option>
                        <option value="慣行栽培">慣行栽培</option>
                        <option value="自然栽培">自然栽培</option>
                    </select>


                </div>
                <div class="crop-form-group">
                    <label for="fertilizer_info" class="crop-form-label">使用した肥料情報</label>
                    <textarea class="crop-textarea" name="fertilizer_info" id="fertilizer_info"></textarea>
                </div>
                <div class="crop-form-group">
                    <label for="pesticide_info" class="crop-form-label">使用した農薬情報</label>
                    <textarea class="crop-textarea" name="pesticide_info" id="pesticide_info"></textarea>
                </div>
                <div class="crop-form-group">
                    <label for="description" class="crop-form-label">アピールポイント（魅力）</label>
                    <textarea class="crop-textarea" name="description" id="description"></textarea>
                </div>
                <div class="crop-form-group">
                    <label for="cooking_tips" class="crop-form-label">おすすめの調理法</label>
                    <textarea class="crop-textarea" name="cooking_tips" id="cooking_tips"></textarea>
                </div>
                <div class="crop-form-group">
                    <label for="images" class="crop-image-upload-label">画像をアップロード</label>
                    <input type="file" class="crop-form-control" id="images" name="images[]" multiple>
                </div>
                <div class="crop-form-group">
                    <label for="video" class="crop-image-upload-label">動画のアップロード</label>
                    <input type="file" class="crop-form-control" id="video" name="video">
                </div>
                <button type="submit" class="crop-btn-primary">登録</button>
            </form>
        </div>
    </div>
</div>
@endsection
