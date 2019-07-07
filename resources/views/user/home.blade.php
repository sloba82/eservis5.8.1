@extends('layouts.app')



@section('content')

<!-- Top content -->
<div class="top-content" id="topContent">
    <div class="inner-bg">
        <div class="container">

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <div class="logo wow fadeInDown">
                        <a href="index.html"></a>
                    </div>
                    <h1 class="wow fadeInLeftBig">Auto servis Ljuba ms</h1>
                    <img src="{{URL::asset('app/assets/img/serviceicons2.png')}}">
                    <div class="description wow fadeInLeftBig">
                        <p class="smallTmargine">
                           <h3>Servis za auto elektriku</h3>
                        </p>
                    </div>
                    <div class="top-big-link wow fadeInUp">
                        <a id="setappointment" class="btn btn-warning btn-lg" href="#">Zakaži servis</a>
                        <a class="btn btn-info btn-lg" href="#services">Proveri status vozila</a>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>

<div id="appoitment">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="well-block">
                    <div class="well-title">
                        <h2>Zakaži servis vozila</h2>
                    </div>
                    <form  id="appoitmentForm" class="form"  method="post" action="/appointmentsave" > <!--stavi id="appoitment" u tok trenutku nestaje forma -->
                        <!-- Form start -->
                     


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Ime</label>
                                    <input id="name" name="name" type="text" placeholder="Ime" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="last_name">Prezime</label>
                                    <input id="last_name" name="last_name" type="text" placeholder="Prezime" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md">
                                </div>
                            </div>


                            <!-- Text input-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="date">Mobilni telefon</label>
                                    <input id="date" name="phone" type="number" placeholder="Mobilni telefon" class="form-control input-md">
                                </div>
                            </div>


                             <!-- Text input-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="vhe_make">Model vozila</label>
                                    <input id="veh_make" name="veh_make" type="text" placeholder="Model vozila" class="form-control input-md">
                                </div>
                            </div>

                            <!-- datepicker -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="datetimepicker">Zakazi datum i vreme servisa</label>
                                    <input id="datetimepicker" name="appoitment" type="text"  class="form-control input-md" >

                                </div>
                            </div>
                            <!-- datepicker -->

                            <!-- Select Basic -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="opiskvara">Opis kvara</label>
                                    <textarea  id="opiskvara" name="description" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button id="singlebutton"  class="btn btn-success">Zakazi servis</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="well-block">
                    <div class="well-title">
                        <h2>Zasto servisirati vozilo kod nas?</h2>
                    </div>
                    <div class="feature-block">
                        <div class="feature feature-blurb-text">
                            <h4 class="feature-title">Uvek na raspolaganju</h4>
                            <div class="feature-content">
                                <p>Integer nec nisi sed mi hendrerit mattis. Vestibulum mi nunc, ultricies quis vehicula et, iaculis in magnestibulum.</p>
                            </div>
                        </div>
                        <div class="feature feature-blurb-text">
                            <h4 class="feature-title">Iskusno osoblje</h4>
                            <div class="feature-content">
                                <p>Aliquam sit amet mi eu libero fermentum bibendum pulvinar a turpis. Vestibulum quis feugiat risus. </p>
                            </div>
                        </div>
                        <div class="feature feature-blurb-text">
                            <h4 class="feature-title">Povoljne cene usluga</h4>
                            <div class="feature-content">
                                <p>Praesent eu sollicitudin nunc. Cras malesuada vel nisi consequat pretium. Integer auctor elementum nulla suscipit in.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="services">
    <div class="container-fluid" style="background-color: #f4f4f4; ">
        <img src="{{URL::asset('app/assets/img/body.jpg')}}">
    </div>
</div>


@endsection
