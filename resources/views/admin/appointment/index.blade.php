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
                @if (count($allapointments))
                    @foreach($allapointments as $allapointment )
                        @if ($allapointment->active == 1)
                            <tr class="hover @if($allapointment->confirm) confirm @endif ">
                                <td> {{$allapointment->id}}</td>
                                <td>{{str_limit($allapointment->appoitment, $limit = 16, $end ='' ) }} </td>
                                <td>{{ $allapointment->name}} </td>
                                <td>{{ $allapointment->last_name}} </td>
                                <td>{{ $allapointment->phone}} </td>
                                <td>{{ $allapointment->veh_make}} </td>
                                <td>{{ str_limit( $allapointment->comment_admin, $limit = 20, $end = '...') }}</td>
                                <td><a href="{{ route('appointment.edit', $allapointment->id ) }}">
                                        <button type="button" class="btn btn-info btn-sm">Detalji / Izmene</button>
                                    </a></td>
                                <td>
                                    <button
                                            id="{{$allapointment->id}}"
                                            type="button"
                                            data-action="confirm"
                                            class="btn btn-success btn-sm"
                                            @if($allapointment->confirm)
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
        {{ $allapointments->links() }}
    </div>

@endsection



