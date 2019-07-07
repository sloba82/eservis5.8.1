@extends('admin.admin_index')

@section('content')
    <div class="container">

        @includeIf('Modals.delete')
        @includeIf('Modals.edit')

        <div class="col-xs-12 col-md-12 col-lg-12">
            Servis primio: {{$carData['serviceData']['service_man']}}
            Status servisa: {{$carData['serviceData']['service_status']}}
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <i class="fa fa-search-plus pull-left icon"></i>
                    <h2>Invoice for purchase #33221</h2>
                </div>
                <hr>

                <div class="row">

                    <div class="col-md-8">
                        <button class="btn btn-primary btn-outline btn-sm">Small Button</button>
                        <button class="btn btn-success btn-outline btn-sm">Small Button</button>
                        <button class="btn btn-warning btn-outline btn-sm">Small Button</button>
                        <button class="btn btn-default btn-outline btn-sm">Small Button</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-lg-8">
                        <div class="panel panel-default height">
                            <div class="panel-heading"><i class="fas fa-list-ul"></i> Stavke servisa</div>
                            <div class="panel-body">
                                <label for="name">Opis servisne stavke:</label>
                                <input name="service_item_description" type="text" class="form-control" id="name">

                                <label for="address">Cena po komadu:</label>
                                <input name="service_item_price" type="text" class="form-control" id="address">

                                <label for="city">Komada:</label>
                                <input name="service_item_pieces" type="text" class="form-control" id="city">

                            </div>
                            <div class="row">
                                <button class="btn btn-success btn-sm pull-right">Sacuvaj</button>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class=""><strong>Racun servisa / broj: {{$carData['serviceData']['service_name']}}</strong></h3>
                                <div class="row">
                                    <p>
                                        <button class="btn btn-primary btn-outline btn-sm">PDF</button>
                                        <button class="btn btn-success btn-outline btn-sm">Posalji na email</button>
                                        <button class="btn btn-warning btn-outline btn-sm">Small Button</button>
                                        <button class="btn btn-default btn-outline btn-sm">Small Button</button>
                                    </p>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <td><strong>Opis</strong></td>
                                            <td class="text-center"><strong>Cena kom.</strong></td>
                                            <td class="text-center"><strong>Komada</strong></td>
                                            <td class="text-center"><strong>PDV</strong></td>
                                            <td class="text-right"><strong>Ukupno</strong></td>
                                            <td class="text-right"><strong>Edit</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Samsung Galaxy S5</td>
                                            <td class="text-center">$900</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">20%</td>
                                            <td class="text-right"><strong>$900</strong></td>
                                            <td class="text-right">
                                                <span style="color: green"
                                                      data-toggle="modal"
                                                      data-target="#editModal"
                                                      data-whatever="Ovde menjati tekst">
                                                    <i class="far fa-edit"></i></span>
                                                <strong>/</strong>
                                                <span style="color: red"
                                                      data-toggle="modal"
                                                      data-target="#delateModal">
                                                    <i class="far fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Samsung Galaxy S5</td>
                                            <td class="text-center">$900</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">20%</td>
                                            <td class="text-right"><strong>$900</strong></td>
                                            <td class="text-right">
                                                <span style="color: green"
                                                      data-toggle="modal"
                                                      data-target="#editModal"
                                                      data-whatever="Ovde menjati tekst">
                                                    <i class="far fa-edit"></i></span>
                                                <strong>/</strong>
                                                <span style="color: red"
                                                      data-toggle="modal"
                                                      data-target="#delateModal">
                                                    <i class="far fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Samsung Galaxy S5</td>
                                            <td class="text-center">$900</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">20%</td>
                                            <td class="text-right"><strong>$900</strong></td>
                                            <td class="text-right">
                                                <span style="color: green"
                                                      data-toggle="modal"
                                                      data-target="#editModal"
                                                      data-whatever="Ovde menjati tekst">
                                                    <i class="far fa-edit"></i></span>
                                                <strong>/</strong>
                                                <span style="color: red"
                                                      data-toggle="modal"
                                                      data-target="#delateModal">
                                                    <i class="far fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Samsung Galaxy S5</td>
                                            <td class="text-center">$900</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">20%</td>
                                            <td class="text-right"><strong>$900</strong></td>
                                            <td class="text-right">
                                                <span style="color: green"
                                                      data-toggle="modal"
                                                      data-target="#editModal"
                                                      data-whatever="Ovde menjati tekst">
                                                    <i class="far fa-edit"></i></span>
                                                <strong>/</strong>
                                                <span style="color: red"
                                                      data-toggle="modal"
                                                      data-target="#delateModal">
                                                    <i class="far fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Samsung Galaxy S5</td>
                                            <td class="text-center">$900</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">20%</td>
                                            <td class="text-right"><strong>$900</strong></td>
                                            <td class="text-right">
                                                <span style="color: green"
                                                      data-toggle="modal"
                                                      data-target="#editModal"
                                                      data-whatever="Ovde menjati tekst">
                                                    <i class="far fa-edit"></i></span>
                                                <strong>/</strong>
                                                <span style="color: red"
                                                      data-toggle="modal"
                                                      data-target="#delateModal">
                                                    <i class="far fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Samsung Galaxy S5</td>
                                            <td class="text-center">$900</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">20%</td>
                                            <td class="text-right"><strong>$900</strong></td>
                                            <td class="text-right">
                                                <span style="color: green"
                                                      data-toggle="modal"
                                                      data-target="#editModal"
                                                      data-whatever="Ovde menjati tekst">
                                                    <i class="far fa-edit"></i></span>
                                                <strong>/</strong>
                                                <span style="color: red"
                                                      data-toggle="modal"
                                                      data-target="#delateModal">
                                                    <i class="far fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Samsung Galaxy S5 Extra Battery</td>
                                            <td class="text-center">$30.00</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center"><strong>20%</strong></td>
                                            <td class="text-right"><strong>$780</strong></td>
                                            <td class="text-right">
                                                <span style="color: green"
                                                      data-toggle="modal"
                                                      data-target="#editModal"
                                                      data-whatever="Ovde menjati tekst">
                                                    <i class="far fa-edit"></i></span>
                                                <strong>/</strong>
                                                <span style="color: red"
                                                      data-toggle="modal"
                                                      data-target="#delateModal">
                                                    <i class="far fa-trash-alt"></i></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="highrow"></td>
                                            <td class="highrow"></td>
                                            <td class="highrow"></td>
                                            <td class="highrow"></td>
                                            <td class="highrow text-right"><strong>Osnovica</strong></td>
                                            <td class="highrow text-right">$958.00</td>
                                        </tr>
                                        <tr>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-right"><strong>PDV</strong></td>
                                            <td class="emptyrow text-right">$20</td>
                                        </tr>
                                        <tr>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow"></td>
                                            <td class="emptyrow text-right"><strong>Ukupno sa PDV</strong></td>
                                            <td class="emptyrow text-right">$978.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <div class="panel panel-default height">
                            <div class="panel-heading"><i class="fas fa-wrench"></i> Servisni Podaci</div>
                            <div class="panel-body">
                                <label for="">Status servisa:</label>
                                {{$carData['serviceData']['service_status']}}
                                <label for="">Servis primio:</label>
                                {{$carData['serviceData']['service_man']}}
                                <label for="kilometer">Kilometri na servisu:</label>
                                <input name="kilometer"
                                       type="number"
                                       class="form-control"
                                       value="{{$carData['serviceData']['kilometer']}}"
                                       id="kilometer" disabled>


                                <label for="description">Opis kvara:</label>
                                <textarea
                                        rows="2"
                                        name="description"
                                        class="form-control"
                                        id="description"
                                        disabled>{{$carData['serviceData']['description']}}
                                 </textarea>
                            </div>
                        </div>
                        @if (isset($carData['carData']['numberplate']))
                            <div class="panel panel-default height">
                                <div class="panel-heading"><i class="fas fa-car"></i> Informacije o vozilu</div>
                                <div class="panel-body">
                                    <label for="numberplate">Broj tablica:</label>
                                    <input name="numberplate" type="text" class="form-control" id="numberplate"
                                           value="{{$carData['carData']['numberplate']}}" disabled>

                                    <label for="make">Marka vozila:</label>
                                    <input name="make" type="text" class="form-control" id="make"
                                           value="{{$carData['carData']['make']}}"
                                           disabled>

                                    <label for="model">Model vozila:</label>
                                    <input name="model" type="text" class="form-control" id="model"
                                           value="{{$carData['carData']['model']}}"
                                           disabled>

                                    <label for="engine">Motor:</label>
                                    <input name="engine" type="text" class="form-control" id="engine"
                                           value="{{$carData['carData']['engine']}}"
                                           disabled>

                                    <label for="year">Godina:</label>
                                    <input name="year" type="text" class="form-control" id="year"
                                           value="{{$carData['carData']['year']}}"
                                           disabled>

                                    <label for="mileage">Kilometri:</label>
                                    <input name="mileage" type="text" class="form-control" id="mileage"
                                           value="{{$carData['carData']['mileage']}}" disabled>
                                </div>
                            </div>
                        @endif
                        @if (isset($carData['carData']['name']))
                            <div class="panel panel-default height">
                                <div class="panel-heading"><i class="fas fa-user-tie"></i> Informacije o vlasniku vozila
                                </div>
                                <div class="panel-body">
                                    <label for="name">Ime i prezime:</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                           value="{{$carData['carData']['name']}} {{$carData['carData']['last_name']}}"
                                           disabled>

                                    <label for="address">Adresa:</label>
                                    <input name="address" type="text" class="form-control" id="address"
                                           value="{{$carData['carData']['address']}}"
                                           disabled>

                                    <label for="city">Grad:</label>
                                    <input name="city" type="text" class="form-control" id="city"
                                           value="{{$carData['carData']['city']}}"
                                           disabled>

                                    <label for="phone">Kontakt tel.</label>
                                    <input name="phone" type="text" class="form-control" id="phone"
                                           value="{{$carData['carData']['phone']}}"
                                           disabled>

                                    <label for="year">Vlasnik registrovan u aplikaciju:</label>
                                    <input name="year" type="text" class="form-control" id="year"
                                           value="{{$carData['carData']['created_at']}}"
                                           disabled>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .btn-outline {
            background-color: transparent;
            color: inherit;
            transition: all .5s;
        }

        .btn-primary.btn-outline {
            color: #428bca;
        }

        .btn-success.btn-outline {
            color: #5cb85c;
        }

        .btn-info.btn-outline {
            color: #5bc0de;
        }

        .btn-warning.btn-outline {
            color: #f0ad4e;
        }

        .btn-danger.btn-outline {
            color: #d9534f;
        }

        .btn-primary.btn-outline:hover,
        .btn-success.btn-outline:hover,
        .btn-info.btn-outline:hover,
        .btn-warning.btn-outline:hover,
        .btn-danger.btn-outline:hover {
            color: #fff;
        }

        .height {
            min-height: 200px;
        }

        .icon {
            font-size: 47px;
            color: #5CB85C;
        }

        .iconbig {
            font-size: 77px;
            color: #5CB85C;
        }

        .table > tbody > tr > .emptyrow {
            border-top: none;
        }

        .table > thead > tr > .emptyrow {
            border-bottom: none;
        }

        .table > tbody > tr > .highrow {
            border-top: 3px solid;
        }
    </style>



    <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes

console.log(recipient);


            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>









@endsection