<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
    <link rel="stylesheet" href="{{ URL::asset('app/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/datetimepicker/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('app/assets/css/media-queries.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ URL::asset('app/assets/ico/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{ URL::asset('app/assets/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{ URL::asset('app/assets/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{ URL::asset('app/assets/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed"
          href="{{ URL::asset('app/assets/ico/apple-touch-icon-57-precomposed.png')}}">


</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-1 text-left">
            <img src="{{URL::asset('app/assets/img/mup.png')}}">
        </div>
        <div class="col-md-10 text-left">
            <h2 class="blackText">Citac elektronske saobracajne dozvole</h2>
        </div>
    </div>
    <div class="col-md-12 backColorMarginPading">


        <form id="cardReader"
              role="form"
              method="post"
              action="">
            {{ csrf_field() }}


        <div class="col-md-4 text-left">
            <h4 class="borderBottom blackText">Podaci vozila:</h4>

            <label for="first_registrstion">Broj sasije:</label>
            <input name="first_registrstion" type="text" class="form-control input-sm blackText" id="first_registrstion"
                   value="{{ $newData['VehicleIDNumber'] }}" disabled>
            <label for="year">Godina proizvodnje:</label>
            <input name="year" type="text" class="form-control input-sm blackText" id="year"
                   value="{{ $newData['YearOfProduction'] }}" disabled>
            <label for="make">Marka:</label>
            <input name="make" type="text" class="form-control input-sm blackText" id="make"
                   value="{{ $newData['VehicleMake'] }}" disabled>

            <label for="model">Model:</label>
            <input name="model" type="text" class="form-control input-sm blackText" id="model"
                   value="{{ $newData['CommercialDescription'] }}" disabled>

            <label for="numberplate">Broj tablica:</label>
            <input name="numberplate" type="text" class="form-control input-sm blackText" id="numberplate"
                   value="{{ $newData['RegistrationNumberOfVehicle'] }}" disabled>

            <label for="engine">Zapremina motora:</label>
            <input name="engine" type="text" class="form-control input-sm blackText" id="engine"
                   value="{{ $newData['EngineCapacity'] }}" disabled>

            <label for="fuel">Gorivo:</label>
            <input name="fuel" type="text" class="form-control input-sm blackText" id="fuel"
                   value="{{ $newData['TypeOfFuel'] }}" disabled>

            <div class="borderBottom pdadingBottom"></div>
        </div>
        <div class="col-md-4 text-left ">
            <h4 class="borderBottom blackText">Podaci vlasnika / kontakt:</h4>

            <label for="name">Ime:</label>
            <input name="name" type="text" class="form-control input-sm blackText" id="name"
                   value="{{ $newData['OwnerName'] }}" disabled>

            <label for="last_name">Prezime / ili poslovno ime:</label>
            <input name="last_name" type="text" class="form-control input-sm blackText" id="last_name"
                   value="{{ $newData['OwnersSurnameOrBusinessName'] }}" disabled>

            <label for="email">Email:</label>
            <input name="email" type="text" class="form-control input-sm blackText" id="email" >

            <label for="phone">Telefon:</label>
            <input name="phone" type="text" class="form-control input-sm blackText" id="phone" >

            <div class="borderBottom pdadingBottom"></div>
        </div>

        <div class="col-md-1"></div>
        <div class="col-md-3 text-left">
            <h4 class="borderBottom blackText">Sledeci korak:</h4>

            <button type="submit" class="toService btn btn-primary btn-lg btn-block" >Posalji u servis</button>
            <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
            <button type="button" class="btn btn-success btn-lg btn-block">Block level button</button>
            <button type="button" class="btn btn-warning btn-lg btn-block">Block level button</button>

            <div class="borderBottom pdadingBottom"></div>
        </div>

        </form>
    </div>

</div>






<!-- Scripts -->
<script src="{{URL:: asset('js/app.js') }}"></script>
<!-- Javascript -->
<script src="{{ URL::asset('app/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ URL::asset('app/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('app/assets/js/jquery.backstretch.min.js')}}"></script>
<script src="{{ URL::asset('app/assets/js/wow.min.js')}}"></script>
<script src="{{ URL::asset('app/assets/js/waypoints.min.js')}}"></script>
<script src="{{ URL::asset('app/assets/js/scripts.js')}}"></script>
<script src="{{URL::asset('jquery/jquery-cardReader.js')}}"></script>
<!--[if lt IE 10]>
<script src="{{ URL::asset('app/assets/js/placeholder.js')}}"></script>
<![endif]-->

<!-- Datatimepicker -->
<script src="{{ URL::asset('app/assets/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<!--End Datatimepicker -->

</body>


</html>