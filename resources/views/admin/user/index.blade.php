@extends('admin.admin_index')


@section('content')
    <div class="container">
        <div class="row">
            <table  class="userTable">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Telefon</th>
                    <th>Komentar Servisa</th>
                    <th>Detalji / Izmeni</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if (count($allUsers))
                    @foreach($allUsers as $user )
                            <tr class="hover">
                                <td>{{str_limit($user->appoitment, $limit = 16, $end ='' ) }} </td>
                                <td>{{ $user->name}} </td>
                                <td>{{ $user->last_name}} </td>
                                <td>{{ $user->phone}} </td>

                                <td>{{ str_limit( $user->comment_admin, $limit = 20, $end = '...') }}</td>
                                <td><a href="{{ route('user.edit', $user->id ) }}">
                                        <button type="button" class="btn btn-info btn-sm">Detalji / Izmene</button>
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>


@endsection
