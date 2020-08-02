@extends('user.home')


@section('nav')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a href="#" class="navbar-left">
                    <img src="{{ URL::asset('app/assets/img/logo2.png')}}">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="top-navbar-1">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Work</a></li>
                    <li><a href="#testimonials">Clients</a></li>
                    <li><a href="#footer">Contact</a></li>

                    @if (Route::has('login'))

                        @if (Auth::check())
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @else
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @endif

                    @endif


                </ul>
            </div>
        </div>
    </nav>

@endsection

