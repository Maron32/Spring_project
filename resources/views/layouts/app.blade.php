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

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        header {
            background: linear-gradient(90deg, rgb(179, 238, 179) 0%, rgb(191, 207, 255) 100%);
        }
        h1 {
            margin: 0;
            padding: 0;
            color: white;
            font-weight: lighter;
            margin-left: 20px;
        }
    </style>
</head>

<header>
    <h1>Bright</h1>
</header>
<body>
    @yield('content')
</body>



</body>
</html>
