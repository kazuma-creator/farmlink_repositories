<!-- resources/views/crops/fancy.blade.php -->
@extends('layouts.public')

@section('content')
<div class="container">
    <div class="hero fancy-hero">
        <h1 style="font-family: 'Caveat', cursive;">{{ $crop->product_name }}</h1>
        <img src="{{ asset('storage/' . $icon) }}" alt="生産者アイコン" class="rounded-circle">
        <p class="description">{{ $crop->description }}</p>
    </div>

    <div class="card-grid">
        <div class="card">
            <h3>栽培方法</h3>
            <p>{{ $crop->cultivation_method }}</p>
        </div>
        <div class="card">
            <h3>所在地</h3>
            <p>{{ $farm_name }}, {{ $farm_address }}</p>
        </div>
    </div>
</div>
@endsection
