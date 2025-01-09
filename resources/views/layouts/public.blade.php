<!-- resources/views/layouts/public.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>野菜情報公開ページ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/public.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Permanent+Marker&display=swap" rel="stylesheet">


</head>
<body>
    <header class="header_area">
        <img src = "{{asset('images/header.png')}}"   class = "img-fluid">
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Your Company</p>
    </footer>
</body>
</html>
