<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management-screen.css')}}">
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ledger.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ledger_create.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">        

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* 全体のレイアウト設定 */
        .layout {
            min-height: 100vh;
            display: flex;
            background-color: #f3f4f6
        }

        /* サイドバーのスタイル */
        .sidebar-container {
            position: fixed;
            top: 4rem;
            left: 0;
            height: 100%; /* 画面の高さ全体をカバー */
            width: 16rem; /* サイドバーの幅 */
            background-color: #065f46; /* 緑 */
            color: #facc15; /* 黄色 */
            padding: 1.5rem;
            overflow-y: auto; /* コンテンツが多い場合にスクロール可能 */
            transform: translateX(0); /* 初期状態: 表示 */
            transition: transform 0.3s ease; /* スライドアニメーション */
        }

        .sidebar-container.hidden{
            transform: translateX(-100%); /* 非表示 */
        }

        .sidebar-container a {
            display: block;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            color: inherit;
            text-decoration: none;
        }

        .sidebar-container a:hover {
            background-color: #047857;
            color: #fde68a;
        }

        /* メインコンテンツのスタイル */
        .main-contents {
            flex: 1;
            margin-left: 16rem; /* サイドバーがある時の余白 */
            padding: 6rem 1.5rem 1.5rem;
            background-color: #f3f4f6;
            transition: margin-left 0.3s ease, width 0.3s ease; /* スムーズなアニメーション */
            width: calc(100% - 16rem);
        } 
        .main-contents.sidebar-hidden {
            margin-left: 0;
        }
        
        /* レスポンシブ対応 */
        @media (max-width:900px) {
            .sidebar-container {
                position: fixed;
                z-index: 50;
                left: -16rem;
                transition: left 0.3s ease;
            }

            .sidebar-container.open {
                left: 0;
            }

            .main-contents {
                margin-left: 0;
            }
        }
    </style>
</head>
    <body class="font-sans antialiased">
        <div class="layout">
            <!-- サイドバー -->
            <div id="sidebar" class="sidebar-container">
                <a href="{{ route('crops.index') }}" class="text-2xl font-bold tracking-wider">
                    FARMLINK
                </a>
                <ul class="mt-8 space-y-4">
                    <li><a href="{{route('record.index')}}">記録</a></li>
                    <li><a href="{{ route('ledger.index') }}">台帳</a></li>
                    <li><a href="{{ route('cropping.index') }}">作付</a></li>
                    <li><a href="{{ route('materials.index') }}">資材</a></li>
                </ul>
            </div>
            <div class="navbar">
                @include('layouts.navigation')
            </div>
            <!-- メインコンテンツ -->
            <div class="main-contents">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- JavaScript for Sidebar Toggle -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.querySelector('.main-contents');
        
                // ハンバーガーボタンを作成
                const toggleButton = document.createElement('button');
                toggleButton.innerText = '☰';
                toggleButton.style.position = 'fixed';
                toggleButton.style.top = '0.5rem';
                toggleButton.style.left = '1rem';
                toggleButton.style.zIndex = '100';
                toggleButton.style.backgroundColor = '#047857';
                toggleButton.style.color = '#facc15';
                toggleButton.style.border = 'none';
                toggleButton.style.padding = '0.5rem 1rem';
                toggleButton.style.fontSize = '1.5rem';
                toggleButton.style.cursor = 'pointer';
                toggleButton.style.zIndex = '1100';
        
                // サイドバー表示/非表示の切り替え
                toggleButton.addEventListener('click', () => {
                    sidebar.classList.toggle('hidden');
                    mainContent.classList.toggle('sidebar-hidden');
                    navbar.classList.toggle('sidebar-hidden');
                });
        
                // ボタンをドキュメントに追加
                document.body.appendChild(toggleButton);
            });
        </script>
    </body>
</html>
