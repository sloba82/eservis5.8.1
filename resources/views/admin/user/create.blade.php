@extends('admin.admin_index')


@section('content')
    <div class="container">
    <form role="form" method="post"
          action="{{ route('user.store') }}">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="col-xs-12 col-md-8 col-lg-8">
            <div class="panel panel-default height">
                <div class="panel-heading">
                    <i class="fas fa-user-tie"></i>
                    <h3>Dodaj korisnika</h3></div>
                <div class="panel-body">
                    <label for="name">Ime:</label>
                    <input name="name"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="name">
                    <label for="last_name">Prezime:</label>
                    <input name="last_name"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="last_name">
                    <label for="phone">Telefon:</label>
                    <input name="phone"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="phone">
                    <label for="email">Email:</label>
                    <input name="email"
                           type="email"
                           class="form-control"
                           autocomplete="off"
                           id="email">
                    <label for="password">Sifra:</label>
                    <input name="password"
                           type="password"
                           class="form-control"
                           autocomplete="off"
                           id="password">
                    <label for="address">Adresa:</label>
                    <input name="address"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="address">
                    <label for="city">Mesto:</label>
                    <input name="city"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="city">
                    <label for="role">Uloga:</label>
                    <input name="role"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="role">

                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success btn-sm pull-right"><i class="far fa-save"></i> Sacuvaj</button>
                </div>
            </div>
        </div>
    </form>
    </div>

@endsection
