@extends('layouts.app')

@extends('layouts.footer')
@extends('layouts.nav')
@section('nav')
    <nav style="color: black !important" class=" custom-navbar  navbar navbar navbar-expand-md navbar-dark bg-dark"
        arial-label="Furni navigation bar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li><a class="nav-link" href="#">Shop</a></li>
                    <li><a class="nav-link" href="{{ asset('./about') }}">About us</a></li>
                    <li><a class="nav-link" href="{{ asset('./services') }}">Services</a></li>
                    <li><a class="nav-link" href="{{ asset('./blog') }}">Blog</a></li>
                    <li><a class="nav-link" href="{{ asset('./contact') }}">Contact us</a></li>

                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href=""></a>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- login Navbar -->
                            <div class="container">
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                            {{-- navbar cart --}}
                            <ul class="navbar-nav me-auto">
                                <li><a class="nav-link" href="cart.html"><img
                                            src="{{ asset('./FE/images/cart.svg') }}"></a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
@endsection
@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status')->message('dang nhap thanh cong') }}
            </div>
        @endif

        <div class="hero">

            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
                            <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                vulputate velit imperdiet dolor tempor tristique.</p>
                            <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#"
                                    class="btn btn-white-outline">Explore</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="{{ asset('./FE/images/couch.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
