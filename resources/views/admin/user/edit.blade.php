@extends('admin.admin_index')


@section('content')
    <div class="container">
    <form role="form" method="post"
          action="{{ route('user.update', $user['id']) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-xs-12 col-md-8 col-lg-8">
            <div class="panel panel-default height">
                <div class="panel-heading">
                    <i class="fas fa-user-tie"></i>
                    <h3>Edituj korisnika</h3></div>
                <div class="panel-body">
                    <label for="name">Ime:</label>
                    <input name="name"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="name"
                           value="{{$user['name']}}">
                    <label for="last_name">Prezime:</label>
                    <input name="last_name"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="last_name"
                           value="{{$user['last_name']}}">
                    <label for="phone">Telefon:</label>
                    <input name="phone"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="phone"
                           value="{{$user['phone']}}">
                    <label for="email">Email:</label>
                    <input name="email"
                           type="email"
                           class="form-control"
                           autocomplete="off"
                           id="email"
                           value="{{$user['email']}}">
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
                           id="address"
                           value="{{$user['address']}}">
                    <label for="city">Mesto:</label>
                    <input name="city"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="city"
                           value="{{$user['city']}}">
                    <label for="role">Uloga:</label>
                    <input name="role"
                           type="text"
                           class="form-control"
                           autocomplete="off"
                           id="role"
                           value="{{$user['role']}}">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success btn-sm pull-right"><i class="far fa-save"></i> Sacuvaj</button>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection