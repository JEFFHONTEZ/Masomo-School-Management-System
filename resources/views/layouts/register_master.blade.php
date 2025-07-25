<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jeff INSPIRED ACADEMY') }}</title>

    @include('partials.register.inc_top')
</head>

<body>
@include('partials.register.header')
@yield('content')
@include('partials.register.footer')

</body>

</html>
