@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>テンプレート選択: {{ $crop->product_name }}</h1>

        <form action="{{ route('crops.templates.update', $crop->id) }}" method="POST">
            @csrf
            <div class="template-selection">
                <!-- デフォルトテンプレート -->
                <div class="template-option">
                    <label>
                        <input type="radio" name="template_id" value="" 
                              data-preview-url="{{ route('crops.preview',['id' => $crop->id, 'template' => 'default']) }}" 
                              {{ is_null($crop->template_id) ? 'checked' : '' }}>
                        デフォルトテンプレート
                    </label>
                </div>

                <!-- 他のテンプレート -->
                @foreach ($templates as $template)
                    <div class="template-option">
                        <label>
                            <input type="radio" name="template_id" value="{{ $template->id }}" 
                                  data-preview-url="{{ route('crops.preview', ['id' => $crop->id, 'template' => $template->blade_file]) }}" 
                                  {{ $crop->template_id == $template->id ? 'checked' : '' }}>
                            {{ $template->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="template-preview">
                <h3>プレビュー</h3>
                <div style="text-align: center;">
                  <iframe id="template-preview-iframe" src="{{ route('crops.preview', ['id' => $crop->id, 'template' => 'default']) }}" style="border: 0;"></iframe>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">保存</button>
        </form>

    </div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const radioButtons = document.querySelectorAll('input[name="template_id"]');
    const previewIframe = document.getElementById('template-preview-iframe');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function () {
            const previewUrl = this.dataset.previewUrl;
            if (previewUrl) {
                previewIframe.src = previewUrl;
            }
        });
    });

    // プレビューサイズ切り替え（デモ用）
    const resizeOptions = document.getElementById('resize-options');
    resizeOptions.addEventListener('change', function () {
        const value = this.value;
        if (value === 'small') {
            previewIframe.style.width = '320px';
            previewIframe.style.height = '568px';
        } else if (value === 'medium') {
            previewIframe.style.width = '375px';
            previewIframe.style.height = '667px';
        } else if (value === 'large') {
            previewIframe.style.width = '414px';
            previewIframe.style.height = '896px';
        }
    });
});
</script>

<style>
  .template-selection {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.template-option {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
}

.template-option:hover {
    background-color: #f9f9f9;
}

.template-preview {
    margin-top: 20px;
    text-align: center;
}

.template-preview img {
    max-width: 100%;
    max-height: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.template-preview iframe {
    width: 375px; /* スマホ幅 */
    height: 667px; /* スマホ高さ */
    border: 1px solid #ccc;
    border-radius: 15px; /* スマホの角丸風 */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* スマホの枠影 */
    margin: 0 auto;
    display: block;
}
@media (max-width: 600px) {
    .template-preview iframe {
        width: 320px; /* スマホ幅（小さいデバイス向け） */
        height: 568px; /* スマホ高さ（小さいデバイス向け） */
    }
}

@media (min-width: 601px) and (max-width: 1024px) {
    .template-preview iframe {
        width: 375px; /* 中型デバイス向け */
        height: 667px;
    }
}


</style>