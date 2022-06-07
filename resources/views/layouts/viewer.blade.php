<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JN Pro Movers') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/map.js') }}" defer></script>
    <script src="{{ asset('js/email.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <!-- Styles -->
    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- -- Custom CSS File -- -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app-login.css') }}">


    {{-- Icon --}}
    <link rel="icon" href="{{ asset('img/jnpro-logo.png')}}" type="image/x-icon">

    {{-- AOS Package --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
</head>
<body class="layout-top-nav" style="height: auto;">
<div class="wrapper">

@include('layouts.navbar')

<!-- Content Wrapper. Contains page content -->
    @if(Request::path() != '/' && Request::path() != 'home')

        <div class="content-wrapper" style="margin-top: 60px">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 my-4 title-page" style="font-size: 50px">
                                @yield('title')
                                <small>@yield('subtitle')</small>
                            </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    @else

        <div>
            @yield('content')
        </div>
    @endif

    @include('layouts.footer-view')
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{--    Google Maps API--}}
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_Yp6qQiS8G8dQoxeYGol5PB7RBaHeh9s&libraries=places&callback=initMap"
    async defer>
</script>

{{-- AOS JS Package --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    AOS.init({
        disable: 'mobile',
        duration: 600,
        easing: 'ease-out'
    });
</script>

@stack('scripts')

</body>

</html>
