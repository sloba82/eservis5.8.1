@extends('admin.admin_index')


@section('content')

    <div class="container">
        {{ csrf_field() }}
        <div class="row">
            <table id="allresoult" class="display cell-border compact strip">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Zakazano</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Telefon</th>
                    <th>Model vozila</th>
                    <th>Komentar Servisa</th>
                    <th>Detalji / Izmeni</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if (count($allAppointments))
                    @foreach($allAppointments as $appointment )
                        @if ($appointment->active == 1)
                            <tr class="hover @if($appointment->confirm) confirm @endif ">
                                <td> {{$appointment->id}}</td>
                                <td>{{str_limit($appointment->appoitment, $limit = 16, $end ='' ) }} </td>
                                <td>{{ $appointment->name}} </td>
                                <td>{{ $appointment->last_name}} </td>
                                <td>{{ $appointment->phone}} </td>
                                <td>{{ $appointment->veh_make}} </td>
                                <td>{{ str_limit( $appointment->comment_admin, $limit = 20, $end = '...') }}</td>
                                <td><a href="{{ route('appointment.edit', $appointment->id ) }}">
                                        <button type="button" class="btn btn-info btn-sm">Detalji / Izmene</button>
                                    </a></td>
                                <td>
                                    <button
                                            id="{{$appointment->id}}"
                                            type="button"
                                            data-action="confirm"
                                            class="btn btn-success btn-sm"
                                            @if($appointment->confirm)
                                            disabled
                                            @endif
                                            >Potvrdi
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection



