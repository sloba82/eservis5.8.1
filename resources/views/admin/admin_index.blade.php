<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/bootstrap/css/bootstrap-responsive.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/datetimepicker/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/css/media-queries.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/DataTables/datatables.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/jquery-ui/jquery-ui.structure.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/jquery-ui/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/css/admin_style.css')}}">
    <script src="https://kit.fontawesome.com/936ebd2161.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>



</head>
<body>
{{--
<nav class="navbar navbar-default navbar-static-top navbaradmin">
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
                <li><a href={{ route('appointment.index')}}>Sva Zakazivanja</a></li>
                <li><a href={{ url('/service') }}>Servis</a></li>
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
</nav>--}}

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{ route('appointment.index')}}">Sva Zakazivanja</a>
            <a class="nav-item nav-link" href="{{ url('/service') }}">Servis</a>
            <a class="nav-item nav-link disabled" href="#">Disabled</a>
            @if (Route::has('login'))
                @if (Auth::check())
                    <a class="nav-item nav-link" href="{{ url('/home') }}">Home</a>
                @else
                    <a class="nav-item nav-link" href="{{ url('/login') }}">Login</a>
                    <a class="nav-item nav-link"  href="{{ url('/register') }}">Register</a>
                @endif

            @endif


    </div>
    </div>
</nav>


@yield('content')

        <!-- Footer -->

<script src="{{ URL:: asset('js/app.js') }}"></script>
<script src="{{ URL::asset('jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('app/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('app/assets/DataTables/datatables.js') }}"></script>
<script src="{{ URL::asset('app/assets/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<script src="{{ URL::asset('app/assets/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ URL::asset('jquery/jquery-admin.js')}}"></script>
<script src="{{ URL::asset('jquery/jquery-admin-ajax.js')}}"></script>


</body>
</html>