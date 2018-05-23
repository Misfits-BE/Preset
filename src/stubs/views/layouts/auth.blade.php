<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title> {{ config('app.name') }} - @yield('title') </title>

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}"/>
    </head>
    <body class="my-login-page">
        <div id="app">
            {{-- Page content --}}
                @yield('content')
            {{-- /// Page content --}}
        </div>

        {{-- JavaScript --}}
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>