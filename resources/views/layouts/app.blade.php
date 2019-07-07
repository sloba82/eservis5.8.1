@extends('layouts.head')



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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


            </div>

            <div class="collapse navbar-collapse" id="top-navbar-1">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Branding Image -->
                    <a href="#" class="navbar-left">
                        <img src="{{ URL::asset('app/assets/img/logo2.png')}}">
                    </a>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Work</a></li>
                    <li><a href="#testimonials">Clients</a></li>
                    <li><a href="#footer">Contact</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @endsection


    @section('body')
    @yield('content')

            <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div id="logoImages">

                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{URL:: asset('js/app.js') }}"></script>
    <!-- Javascript -->
    <script src="{{ URL::asset('app/assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{ URL::asset('app/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('app/assets/js/jquery.backstretch.min.js')}}"></script>
    <script src="{{ URL::asset('app/assets/js/wow.min.js')}}"></script>
    <script src="{{ URL::asset('app/assets/js/waypoints.min.js')}}"></script>
    <script src="{{ URL::asset('app/assets/js/scripts.js')}}"></script>
    <script src="{{URL::asset('jquery/jquery-custom.js')}}"></script>
    <!--[if lt IE 10]>
    <script src="{{ URL::asset('app/assets/js/placeholder.js')}}"></script>
    <![endif]-->

    <!-- Datatimepicker -->
    <script src="{{ URL::asset('app/assets/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
    <!--End Datatimepicker -->

    </body>




    </html>
@endsection