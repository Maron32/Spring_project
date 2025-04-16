<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bright</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    
    <!-- CSS -->
    <!-- ユーザートップ -->
    <link rel="stylesheet" href="{{ asset('css/U_top-style.css') }}">
    <!-- ユーザー登録 -->
    <link rel="stylesheet" href="{{ asset('css/U_register-style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<header>
    <h1>Bright</h1>
</header>
<body>
    @yield('content')
</body>

<script src="{{ asset('js/U_top.js') }}"></script>
<script src="{{ asset('js/U_register.js') }}"></script>
<script src="{{ asset('js/gps.js') }}"></script>
</body>
</html>
