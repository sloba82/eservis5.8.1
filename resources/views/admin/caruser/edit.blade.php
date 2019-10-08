@extends('admin.admin_index')

@section('content')
    <div class="container">
        <form role="form" method="post"
              action="{{ route('car.update', $car['id']) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col-xs-12 col-md-8 col-lg-8">
                <div class="panel panel-default height">
                    <div class="panel-heading">
                        <i class="fas fa-user-tie"></i>
                        <h3>Edituj vozilo</h3></div>
                    <div class="panel-body">
                        <label for="numberplate">Tablice:</label>
                        <input name="numberplate"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="numberplate"
                               value="{{$car['numberplate']}}">
                        <label for="make">Brend:</label>
                        <input name="make"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="make"
                               value="{{$car['make']}}">
                        <label for="model">Model:</label>
                        <input name="model"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="model"
                               value="{{$car['model']}}">
                        <label for="engine">Motor:</label>
                        <input name="engine"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="engine"
                               value="{{$car['engine']}}">
                        <label for="year">Godiste:</label>
                        <input name="year"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="year"
                               value="{{$car['year']}}">
                        <label for="mileage">Kilometraza:</label>
                        <input name="mileage"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="mileage"
                               value="{{$car['mileage']}}">
                        <div class="row">
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
