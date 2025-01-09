@extends('layouts.app')

@section('content')
<div class="crop-body">
    <div class="crop-container">
        <div class="crop-content">
            <h1 class="crop-header">農作物の編集</h1>
            <form action="{{ route('crops.update', $crop->id) }}" method="POST" enctype="multipart/form-data" class="form-design">
                @csrf
                @method('PUT')
                <div class="crop-form-group">
                    <label for="product_name" class="crop-form-label">商品名</label>
                    <input type="text" class="crop-form-control" id="product_name" name="product_name" value="{{ $crop->product_name }}" required>
                </div>
                <div class="crop-form-group">
                    <label for="name" class="crop-form-label">品種名</label>
                    <input type="text" class="crop-form-control" id="name" name="name" value="{{ $crop->name }}" required>
                </div>
                <div class="crop-form-group">
                    <label for="cultivation_method" class="crop-form-label">栽培方法</label>
                    <select class="crop-form-control" id="cultivation_method" name="cultivation_method" value="{{ $crop->cultivation_method }}" required>
                        <option value="">栽培方法を選択してください</option>
                        <option value="有機栽培" {{ $crop->cultivation_method === '有機栽培' ? 'selected' : '' }}>有機栽培</option>
                        <option value="特別栽培" {{ $crop->cultivation_method === '特別栽培' ? 'selected' : '' }}>特別栽培</option>
                        <option value="慣行栽培" {{ $crop->cultivation_method === '慣行栽培' ? 'selected' : '' }}>慣行栽培</option>
                        <option value="自然栽培" {{ $crop->cultivation_method === '自然栽培' ? 'selected' : '' }}>自然栽培</option>
                    </select>
                </div>
                <div class="crop-form-group">
                    <label for="fertilizer_info" class="crop-form-label">使用している肥料</label>
                    <textarea class="crop-textarea" id="fertilizer_info" name="fertilizer_info">{{ $crop->fertilizer_info }}</textarea>
                </div>
                <div class="crop-form-group">
                    <label for="pesticide_info" class="crop-form-label">農薬</label>
                    <textarea class="crop-textarea" id="pesticide_info" name="pesticide_info">{{ $crop->pesticide_info }}</textarea>
                </div>
                <div class="crop-form-group">
                    <label for="description" class="crop-form-label">アピールポイント(魅力)</label>
                    <textarea class="crop-textarea" id="description" name="description" required>{{ $crop->description }}</textarea>
                </div>
                <div class="crop-form-group">
                    <label for="cooking_tips" class="crop-form-label">おすすめの調理法</label>
                    <textarea class="crop-textarea" id="cooking_tips" name="cooking_tips" required>{{ $crop->cooking_tips }}</textarea>
                </div>
                <div class="crop-form-group">
                    <label for="images" class="crop-form-label">商品画像</label>
                    <input type="file" class="crop-form-control" id="images" name="images[]" multiple>
                    <!-- 既存の画像を表示 -->
                    @if ($crop->images)
                        <div class="existing-images">
                            @foreach (json_decode($crop->images, true) as $index => $image)
                                <div class="image-preview">
                                    <img src="{{ asset('storage/' . $image) }}" alt="商品画像" style="max-width: 100px; height: auto;">
                                    <label class="image-delete-label">
                                        <input class="image-delete" type="checkbox" name="delete_images[]" value="{{ $image }}"> 削除
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif            
                </div>
                <div class="crop-form-group">
                    <label for="video" class="crop-form-label">商品紹介動画</label>
                    <input type="file" class="crop-form-control" id="video" name="video">
                    @if ($crop->video)
                        <video controls style="max-width: 300px; height: auto;">
                            <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                            お使いのブラウザでは動画を再生できません。
                        </video>
                    @endif
                </div>
                <button type="submit" class="crop-btn-primary">更新</button>
            </form>
        </div>
    </div>
</div>
@endsection