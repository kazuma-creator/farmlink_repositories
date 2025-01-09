<!-- resources/views/crops/fancy.blade.php -->
@extends('layouts.public')

@section('content')
<div class="corn-container">
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

    <div class="corn-card-grid">
        <div class="corn_card">
            <h3>栽培方法</h3>
            <p>{{ $crop->cultivation_method }}</p>
        </div>
        <div class="corn_dummy"></div>
        <div class="corn_dummy"></div>
        <div class="corn_card">
            <h3>生産地</h3>
            <p>{{ $farm_name }}, {{ $farm_address }}</p>
        </div>
        <div class="corn_card">
            <h3>農薬情報</h3>
            <p>{{ $crop->pesticide_info }}</p>
        </div>
        <div class="corn_dummy"></div>
        <div class="corn_dummy"></div>
        <div class="corn_card">
          <h3>肥料情報</h3>
          <p>{{ $crop->fertilizer_info }}</p>
        </div>
    </div>
</div>
@endsection
