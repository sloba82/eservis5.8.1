@extends('admin.admin_index')


@section('content')
    <div class="container">
        <div class="row">
            <table  class="userTable">
                <thead>
                <tr>
                    <th>Tablice</th>
                    <th>Brend</th>
                    <th>Model</th>
                    <th>Motor</th>
                    <th>Godiste</th>
                    <th>Kilometraza</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if (count($cars))
                    @foreach($cars as $car )
                            <tr class="hover">

                                <td>{{ $car->numberplate}} </td>
                                <td>{{ $car->make}} </td>
                                <td>{{ $car->model}} </td>
                                <td>{{ $car->engine}} </td>
                                <td>{{ $car->year}} </td>
                                <td>{{ $car->mileage}} </td>

                                <td><a href="{{ route('car.edit', $car->id ) }}">
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
