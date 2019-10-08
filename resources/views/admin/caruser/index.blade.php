@extends('admin.admin_index')

@section('content')
    <div class="container">

        car user

       @foreach($carUser as $item)

           {{$item}}

           <hr>

        @endforeach



    </div>


@endsection
