@extends('admin.admin_index')


@section('content')
    @if ($Appointment->confirm == 1)
        <div class="nofitication-head-of-page">
            <h4>Zakazano za : {{$Appointment->appoitment}} </h4>
        </div>
    @endif
    <div class="container">
        <form class="form-horizontal appointmentEdit" role="form" method="post"
            action="{{ route('appointment.update', $Appointment->id ) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12 "><h4 class="pull-left">Detalji zakazanog servisa
                                vozila: {{$Appointment->veh_make}}</h4></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 pull-left control-label">Ime:</label>

                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="name" value="{{$Appointment->name}}">
                        </div>
                        <label class="col-sm-2 pull-left control-label">Prezime:</label>

                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="last_name"
                                   value="{{$Appointment->last_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 pull-left control-label">Telefon:</label>

                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="phone" value="{{$Appointment->phone}}">
                        </div>
                        <label class="col-sm-2 pull-left control-label">Email:</label>

                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="email" value="{{$Appointment->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 pull-left control-label">Zakazano za:</label>

                        <div class="col-lg-8">
                            <input id="datetimepicker" name="appoitment" class="form-control input-md" type="text"
                                   value="{{$Appointment->appoitment}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 pull-left control-label">Model vozila:</label>

                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="veh_make" value="{{$Appointment->veh_make}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 pull-left control-label">Opis kvara:</label>

                        <div class="col-lg-9">
                            <textarea class="form-control" name="description">{{$Appointment->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 pull-left control-label">Komentar Servisa:</label>

                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="comment_admin"
                                   value="{{$Appointment->comment_admin}}">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12 "><h4 class="pull-left">Obavestenja prema klijentu
                                vozila: {{$Appointment->name}}</h4></div>
                    </div>
                    <div class="panel panel-default">
                        <!-- List group -->
                        <ul class="list-group">
                            @if ($Appointment->confirm == 0)
                                <li class="list-group-item">
                                    <div class="pull-left">
                                        <p>Potvrdi zakazivanje</p>
                                    </div>

                                    <div class="material-switch">
                                        <input id="confirm"
                                               name="confirm"
                                               type="checkbox"
                                               value="1"
                                               @if ($Appointment->confirm == 1)
                                               checked="checked"
                                               @endif
                                                />
                                        <label for="confirm" class="label-success"></label>
                                    </div>

                                    <div class="float-right-margine-10px"></div>
                                </li>
                            @else
                                <li class="list-group-item">
                                    <div class="pull-left">
                                        <p>Zakazano</p>
                                    </div>

                                    <div class="material-switch">
                                        <input id="confirm"
                                               name="confirm"
                                               type="checkbox"
                                               value="0"
                                               checked="checked"
                                                />
                                        <label for="confirm" class="label-success"></label>
                                    </div>

                                    <div class="float-right-margine-10px"></div>
                                </li>
                            @endif
                            {{--razmotriti da li prilikom potvrdjivanja ponuditi opciju
                            obavestenja sms-om ili emailom--}}
                            <li class="list-group-item">
                                <div class="pull-left">
                                    <p>Obavesti klijenta SMS</p>
                                </div>

                                <div class="material-switch">
                                    <input id="sms"
                                           name="sms"
                                           type="checkbox"
                                           value="1"
                                            {{--      @if ($Appointment->confirm == 1)--}}
                                            {{--checked="checked"--}}
                                            {{--   @endif--}}
                                            />
                                    <label for="sms" class="label-success"></label>
                                </div>

                                <div class="float-right-margine-10px"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="pull-left">
                                    <p>Obavesti klijenta EMAILOM</p>
                                </div>

                                <div class="material-switch">
                                    <input id="email"
                                           name="email"
                                           type="checkbox"
                                           value="1"
                                            {{--      @if ($Appointment->confirm == 1)--}}
                                            {{--checked="checked"--}}
                                            {{--   @endif--}}
                                            />
                                    <label for="email" class="label-success"></label>
                                </div>

                                <div class="float-right-margine-10px"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sacuvaj promene">
                </div>
                <div class="col-md-4">
                    <input type="reset" class="btn btn-secondary btn-lg btn-block" value="Ponisti / Resetuj">
                </div>
                <div class="col-md-4">
                    <button id="{{$Appointment->id}}" type="button" data-action="active"
                            class="btn btn-danger btn-lg btn-block delete">Obrisi zakazivanje
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection