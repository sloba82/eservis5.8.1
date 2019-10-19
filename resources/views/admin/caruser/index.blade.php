@extends('admin.admin_index')

@section('content')
    <div class="container">
       @foreach($users as $user)

           
            <div class="col-md-4">
                <h5>User: {{ $user->name }}</h5>
            <div>
            <div class="col-md-4">
                <ul>
                @foreach($user->cars as $item)
                    <li>{{$item->numberplate}}</li>
                @endforeach
            </ul>
            <div>
           <hr>

        @endforeach



    </div>


@endsection
