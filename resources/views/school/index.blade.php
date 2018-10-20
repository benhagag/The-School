@extends('layouts.app')

@section('content')

    @include('inc.school')





    <div class="col-lg-6 col-sm-6 maininfo">

        <img src="{{asset('/images')}}/neverstoplearning.jpg" class="learningimg">
        <div class="mount container">
            <h2><span class="glyphicon glyphicon-education">students: {{count($students)}}</h2>
            <h2><span class="glyphicon glyphicon-book">courses: {{count($courses)}}</h2>
        </div>
        <h2 class="ben">Ben's Project <span class="glyphicon glyphicon-send"></h2>


        {{--  this closing div for row  --}}
    </div>

@endsection