@extends('admin.admin_index')


@section('content')
    <div class="container">
        <form role="form" method="post"
              action="{{ route('car.store') }}">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="action" value="{{ isset($newCar['action']) ? $newCar['action'] : '' }}">
            <div class="col-xs-12 col-md-8 col-lg-8">
                <div class="panel panel-default height">
                    <div class="panel-heading">
                        <i class="fas fa-user-tie"></i>
                        <h3>Dodaj vozilo</h3></div>
                    <div class="panel-body">
                        <label for="numberplate">Broj tablica:</label>
                        <input name="numberplate"
                               type="text"
                               class="form-control text-uppercase"
                               autocomplete="off"
                               id="numberplate"
                               @if (isset($newCar['numberplate']))
                               value="{{$newCar['numberplate']}}"
                               @endif
                        >
                        <label for="make">Marka vozila:</label>
                        <input name="make"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="make">
                        <label for="model">Model vozila:</label>
                        <input name="model"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="model">
                        <label for="engine">Motor:</label>
                        <input name="engine"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="engine">
                        <label for="year">Godina:</label>
                        <input name="year"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="year">
                        <label for="mileage">Kilometri:</label>
                        <input name="mileage"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="mileage">
                        <div class="row saveButton">
                            <div class="col-xs-8 col-md-4">
                                <button type="submit" class="btn btn-success btn-sm"><i class="far fa-save"></i> Sacuvaj</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
