<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{URL::asset('/img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('sass/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/sass/app.scss', 'resources/js/rem.js'])
</head>
<body>
<div id="app">
    @if (Auth::check())
        <v-header app_name="{{ config('app.name', 'Laravel') }}"
                  logo="{{URL::asset('/img/logo.png')}}"
                  phone="+7 (916) 816-07-17"
                  user-name="{{ Auth::user()->name }}">
        </v-header>
    @else
        <v-header app_name="{{ config('app.name', 'Laravel') }}"
                  logo="{{URL::asset('/img/logo.png')}}"
                  phone="+7 (916) 816-07-17"
                  user-name="Войти">
        </v-header>
    @endif
    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</div>
</body>
</html>
