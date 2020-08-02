@extends('admin.admin_index')

@section('content')
    <div class="container">
        <form role="form" method="post"
              action="{{ route('user.update', $userEdit['user']['id']) }}">
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
                               value="{{$userEdit['user']['name']}}">
                        <label for="last_name">Prezime:</label>
                        <input name="last_name"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="last_name"
                               value="{{$userEdit['user']['last_name']}}">
                        <label for="phone">Telefon:</label>
                        <input name="phone"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="phone"
                               value="{{$userEdit['user']['phone']}}">
                        <label for="email">Email:</label>
                        <input name="email"
                               type="email"
                               class="form-control"
                               autocomplete="off"
                               id="email"
                               value="{{$userEdit['user']['email']}}">
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
                               value="{{$userEdit['user']['address']}}">
                        <label for="city">Mesto:</label>
                        <input name="city"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="city"
                               value="{{$userEdit['user']['city']}}">
                        <label for="role">Uloga:</label>
                        <select class="form-control" id="role">
                            @foreach($userEdit['userRole'] as $role)
                                <option value="{{$role['id']}}"
                                        @if ($role['id'] == $userEdit['user']['role'])
                                        selected
                                        @endif
                                >{{$role['name']}}</option>
                            @endforeach
                        </select>
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