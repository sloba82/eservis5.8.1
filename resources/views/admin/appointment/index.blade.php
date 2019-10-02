@extends('admin.admin_index')


@section('content')

    <div class="container">
        <div class="row">
            <table  class="allresoult">
                <thead>
                <tr>
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
                                <td>{{str_limit($appointment->appoitment, $limit = 16, $end ='' ) }} </td>
                                <td>{{ $appointment->name}} </td>
                                <td>{{ $appointment->last_name}} </td>
                                <td>{{ $appointment->phone}} </td>
                                <td>{{ $appointment->veh_make}} </td>
                                <td>{{ str_limit( $appointment->comment_admin, $limit = 20, $end = '...') }}</td>
                                <td>
                                    <a href="{{ route('appointment.edit', $appointment->id ) }}">
                                        <button class="btn btn-primary btn-outline btn-sm">Detalji / Izmene</button>
                                    </a></td>
                                <td>
                                    <button
                                            id="{{$appointment->id}}"
                                            data-action="confirm"
                                            class="btn btn-success btn-outline btn-sm"
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



