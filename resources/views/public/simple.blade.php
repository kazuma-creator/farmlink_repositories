<!-- resources/views/crops/simple.blade.php -->
@extends('layouts.public')

@section('content')
<div class="simpler-container">
    <!-- Hero Section -->
    <section class="hero">
        <div class="slider-container">
            <div class="slider">
                @if ($crop->images)
                    @foreach (json_decode($crop->images, true) as $image)
                        <div class="slide">
                            <img src="{{ asset('storage/' . $image) }}" alt="Image">
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- ナビゲーションボタン -->
            <button class="prev">&lt;</button>
            <button class="next">&gt;</button>
        </div>
        <div class="hero-content">
            <h1>{{ $crop->product_name }} -{{ $crop->name }}-</h1>
            @if (str_contains($crop->cultivation_method, '有機栽培'))
                <span class="badge">有機栽培</span>
            @elseif (str_contains($crop->cultivation_method, '特別栽培'))
                <span class="badge">特別栽培</span>
            @elseif (str_contains($crop->cultivation_method, '慣行栽培'))
                <span class="badge">慣行栽培</span>
            @elseif (str_contains($crop->cultivation_method, '自然栽培'))
                <span class="badge">自然栽培</span>
            @endif
        </div>
    </section>
            <!-- Farmer Information -->
    <section class="section">
        <h2 class="section-title">農家の一言</h2>
        <div class="simple-card">
            <div class="farmer-profile">
                <div class="farmer-avatar">
                    <img src="{{ asset('storage/' . $icon) }}" alt="User Icon" >
                </div>
                <div class="farmer-info">
                    <h3>{{ $name }}</h3>
                </div>
            </div>
            <p class="farmer-philosophy">
                {!! nl2br(e($crop->description)) !!}
            </p>
        </div>
    </section>


    <!-- Main Content -->
    <main>
        <!-- Product Information -->
        <section class="section">
            <br>
            <h2 class="section-title">商品情報</h2>
            <div class="card-grid">
                <div class="simple_card">
                    <div class="card-icon">📍</div>
                    <h3>生産地</h3>
                    <p>{{ $farm_name}}</p>
                    <p>{{ $farm_address }}</p>
                </div>
                <div class="simple_card">
                    <div class="card-icon">🌱</div>
                    <h3>栽培方法</h3>
                    <p>{{ $crop->cultivation_method }}</p>
                </div>
                <div class="simple_card">
                    <div class="card-icon">💧</div>
                    <h3>農薬情報</h3>
                    <p>{{ $crop->pesticide_info }}</p>
                </div>
                <div class="simple_card">
                    <div class="card-icon">🍃</div>
                    <h3>肥料情報</h3>
                    <p>{{ $crop->fertilizer_info }}</p>
                </div>
            </div>
        </section>


        <!-- Recommended Recipes -->
        <section class="section">
            @if (!empty($crop->cooking_tips))
            <h2 class="section-title">農家おすすめの調理法</h2>
            <div class="simple-card">
                @if ($crop->recipe_image)
                    <img src="{{ asset('storage/' . $crop->recipe_image) }}" alt="おすすめレシピ" class="recipe-image">
                @endif
                <p class="recipe-description">
                    {!! nl2br(e($crop->cooking_tips)) !!}
                </p>
            </div>
            @endif
        </section>
        <!-- Video Section -->
        <section class="section">
            @if (!empty($crop->video))
                <h2 class="section-title">紹介動画</h2>
                <div class="card">
                    <video controls class="w-full rounded-lg shadow">
                        <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                        お使いのブラウザは動画タグに対応していません。
                    </video>
                </div>
            @endif
        </section>        
    </main>
</div>
@endsection

<script>
   document.addEventListener("DOMContentLoaded", function () {
        const slider = document.querySelector(".slider");
        const slides = document.querySelectorAll(".slide");
        const prevButton = document.querySelector(".prev");
        const nextButton = document.querySelector(".next");

        let currentIndex = 0;

        // スライダーを更新
        function updateSlider() {
            const offset = -currentIndex * 100; // 表示位置を計算
            slider.style.transform = `translateX(${offset}%)`;
        }

        // 前のスライド
        prevButton.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        });

        // 次のスライド
        nextButton.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        });

        // 自動スライド (任意で設定)
        setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }, 5000); // 5秒ごとにスライド
    });
 </script>