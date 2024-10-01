<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Libreando') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-bar.css')}}">

    @stack('styles')
</head>

<body>
    <x-navigation/>

    @isset($header)
        <header>
            <div>
                {{ $header }}
            </div>
        </header>
    @endisset

    {{ $slot }}
</body>

</html>