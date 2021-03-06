@extends('admin.admin_index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4>
                    Relacije Vlasnik vozila <> vozilo.
                </h4>
            </div>
        </div>
        <div class="row">
            <form role="form"
                  method="post"
                  class="serachUser"
                  action="{{ route('caruser.index') }}">
                {{ csrf_field() }}
                {{ method_field('GET') }}
                <div class="col-md-8">
                    <div class="form-group">
                        <input name="search"
                               type="text"
                               class="form-control"
                               autocomplete="off"
                               id="search">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-outline">Pretrazi</button>
                </div>
            </form>
        </div>
        @foreach($users as $user)
            <div class="row">
                <div class="col-md-4" id="{{$user->id}}">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5>Vlasnik:
                                <a href="{{ route('user.edit', $user->id ) }}">
                                    <b>{{ $user->name }} {{ $user->last_name }} </b>
                                </a>
                            </h5>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        @foreach($user->cars as $item)
                            <li class="list-group-item">
                                <div class="col-md-8">
                                    <p> Broj tablica:
                                        <a href="{{ route('car.edit', $item->id ) }}">
                                            <b>{{$item->numberplate}}</b>
                                        </a>
                                    </p>
                                    <p> Marka vozila: <b>{{$item->make}}</b> |
                                        Model vozila: <b>{{$item->model}}</b></p>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <form role="form"
                                          method="post"
                                          action="{{ route('caruser.destroy', $user->id ) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="car_id" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-warning btn-outline"><i
                                                    class="far fa-trash-alt"></i> Obrisi
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                        <li class="list-group-item bg-info text-white">
                            <form role="form"
                                  method="post"
                                  class="addCarForm"
                                  action="{{ route('caruser.store') }}">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="addCar">Odaberi vozilo:</label>
                                            <select class="form-control" id="addCar" name="car_id">
                                                <option></option>
                                                @foreach($availableCars as $key => $value )
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success btn-outline">Dodaj vozilo</button>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="pageloader" id="pageloader{{$user->id}}">
                                            <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif"
                                                 alt="processing..."/>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </li>
                    </ul>
                </div>
                <div>
                    <hr/>
                </div>
            </div>
        @endforeach
        {{ $users->links() }}
    </div>


@endsection
