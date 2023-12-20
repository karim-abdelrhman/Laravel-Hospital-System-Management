<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Hospital') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('layouts.header')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{URL::asset('assets/dist/img/user1-128x128.jpg')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        @include('layouts.main-headerbar')

        @include('layouts.main-sidebar')
        <!-- Content Wrapper. Contains page content -->

            @yield('content')

    </div>

    </div>
    <!-- ./wrapper -->
    @include('layouts.footer')
    {{--java script and jquery--}}
    @include('layouts.footer-scripts')
    </body>
</html>



