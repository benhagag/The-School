@extends('layouts.app')

@section('content')

    @include('inc.users')


    <div class="col-lg-6 col-sm-6">
        <div class="divedittop">
            <small class="nameinedit"> {{$user->name}} </small>


            <a href="{{url('/users')}}/{!!$user->id!!}/edit" class="btn btn-primary editbtn">Edit</a>
        </div>
        <hr class="hredit">
        <img src="{{asset('/storage/image')}}/{{$user->image}}" class="showimage">
        <div class="infostudent">
            <h3>{{$user->name}}, {{$user->role}}</h3>
            <p>{{$user->email}}</p>
            <p>{{$user->phone}}</p>
        </div>
        <hr>


    </div>



    {{--  this closing div for row  --}}

    </div>

@endsection