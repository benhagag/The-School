@extends('layouts.app')

@section('content')

    @include('inc.users')





    <div class="col-lg-6 col-sm-6 maininfo">

        <img src="{{asset('/images')}}/neverstoplearning.jpg" class="learningimg">
        <div class="mount container">
            <h2><span class="glyphicon glyphicon-user">Users: {{count($users)}}</h2>
        </div>
        <h2 class="ben">Ben's Project <span class="glyphicon glyphicon-send"></h2>


        {{--  this closing div for row  --}}
    </div>

@endsection