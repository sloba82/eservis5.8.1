@extends('admin.admin_index')

@section('content')
    <div class="container">



       @foreach($carUser->cars as $item)

           {{var_dump($item->numberplate)}}

           <hr>

        @endforeach



    </div>


@endsection
