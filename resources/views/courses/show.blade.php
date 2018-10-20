@extends('layouts.app')

@section('content')

    {{--  this is is the main school page courses and students  --}}
    @include('inc.school')

    <div class="col-lg-6 col-sm-6">
        <div class="divedittop">
            <small class="nameinedit"> Course- {{$course->name}} </small>
            @if (Auth::user()->role=="owner"||Auth::user()->role=="manager")
                <a href="{{url('/courses')}}/{!!$course->id!!}/edit" class="btn btn-primary editbtn">Edit</a>
            @endif
        </div>
        <hr class="hredit">
        <img src="{{asset('/storage/image')}}/{{$course->image}}" class="showimage">
        <div class="infostudent">
            <h3>{{$course->name}}</h3>
            <p>{{$course->description}}</p>
        </div>
        <br>
        <hr>
        <h3>Students</h3>
        <br>
        <hr>
        @if(count($course->students)>0)
            @foreach($course->students as $student)
                <div class="divedittop">
                    <img src="{{asset('/storage/image')}}/{{$student->image}}" class="courserstudentsimage">
                    <small class="coursesstudentslabel">{{$student->name}}</small>
                </div>
                <br><br>
                <hr>

            @endforeach
        @else
            <p>No Students Found</p>
        @endif


    </div>



    {{--  this closing div for row  --}}
    </div>

@endsection