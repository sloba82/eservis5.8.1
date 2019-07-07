@extends('admin.admin_index')


@section('content')





    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-left">
                <h3>
                    Upis vozila u servis
                </h3>
            </div>
        </div>
    </div>


    <div class="container">
        <form class="form-horizontal appointmentEdit serviceAdd"
              role="form"
              method="post"
              action="/service-addcar"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="carID" value="{{$addCar['carID']}}">
            <input type="hidden" id="service_date" name="service_date" value="">


            <div class="row">
                <div class="col-sm-12">
                </div>
            </div>

            <div class="borderColorMargin">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h4>Informacije o vozilu:</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="numberplate">Broj tablica:</label>
                        <input name="numberplate" type="text" class="form-control input-sm" id="numberplate"
                               value="{{$addCar['numberplate']}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="make">Marka vozila:</label>
                        <input name="make" type="text" class="form-control input-sm" id="make" value="{{$addCar['make']}}"
                               disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="model">Model vozila:</label>
                        <input name="model" type="text" class="form-control input-sm" id="model" value="{{$addCar['model']}}"
                               disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="engine">Motor:</label>
                        <input name="engine" type="text" class="form-control input-sm" id="engine" value="{{$addCar['engine']}}"
                               disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="year">Godina:</label>
                        <input name="year" type="text" class="form-control input-sm" id="year" value="{{$addCar['year']}}"
                               disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="mileage">Kilometri:</label>
                        <input name="mileage" type="text" class="form-control input-sm" id="mileage"
                               value="{{$addCar['mileage']}}" disabled>
                    </div>
                </div>
            </div>

            <div class="borderMargin">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h4>Upis novih podataka:</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="kilometer">Kilometri Novi:</label>
                        <input name="kilometer" type="number" class="form-control input-lg" id="kilometer" required>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-8">
                        <label for="description">Opis kvara:</label>
                        <textarea
                                rows="4"
                                name="description"
                                type="text"
                                class="form-control input-lg"
                                id="description"
                                required>
                        </textarea>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-4">
                    <input type="file" name="serviceimages" multiple accept="image/*">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="submit" name="saveService" value="Sacuvaj" class="btn btn-success btn-sm">
                    <input type="reset" value="Resetuj" class="btn btn-success btn-sm">
                </div>
            </div>
        </form>
    </div>

@endsection