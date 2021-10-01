<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/home4-fullwidth.html   11 Nov 2019 12:24:38 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Belle Multipurpose Bootstrap 4 Html Template</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/mosoners/builder-icon.png') }}" />
    {{-- <link href="" rel="stylesheet" /> --}}
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    {{-- landingpage css --}}
    {{-- <link rel="stylesheet" href="{{asset('css/landing.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Carousel Link -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    {{-- step form css --}}
    <link rel="stylesheet" href="{{ asset('css/stepform.css') }}">


</head>

<body>
    <!--Mobile Menu-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white pl-5 pr-5">
        <a class="navbar-brand" href="#"> <img src="{{ asset('images/mosoners/LOGO_1.png') }}"
                style="width:90px; height:60px;">
            <p class="h4 heading ml-0">Masoners</p>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link mr-2 text-dark" href="{{ route('getideas.open') }}">Get Ideas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-2 text-dark" href="{{ route('findprofessional.open') }}">Find
                        Professional</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-2 text-dark" href="{{ route('shopping.open') }}">Shop</a>
                </li>
                <li class="nav-item pr-5 mr-5">
                    {{-- <a class="nav-link mr-2 text-dark" href="{{ route('profile.open') }}">Profile</a> --}}
                </li>
                @if (Route::has('login'))
                    {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                    @auth


                        <li class="nav-item">
                            <a href="{{ url('/home') }}">
                                <button class=" mr-3 btn btn-outline-secondary bg-light pl-4 pr-4"
                                    style="border-radius: 4px;" type="button" href="#">Dashboard</button>
                            </a>
                        </li>
                    @else

                        <li class="nav-item">
                            <a href="{{ route('login') }}">
                                <button class=" mr-3 btn btn-outline-secondary bg-light pl-4 pr-4"
                                    style="border-radius: 4px;" type="button" href="#">Login</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}">
                                <button class=" mr-3 btn btn-outline-secondary bg-light pl-4 pr-4"
                                    style="border-radius: 4px;" type="button" href="#">Sign up</button>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}">
                                    <button class=" mr-3 btn btn-outline-secondary bg-light pl-4 pr-4"
                                        style="border-radius: 4px;" type="button" href="#">Sign up as pro</button>
                                </a>
                            </li>
                        @endif
                    @endauth
        </div>
        @endif
        </ul>
        </div>
    </nav>
