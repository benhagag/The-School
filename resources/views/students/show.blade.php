@extends('layouts.app')

@section('content')

    {{--  this is is the main school page courses and students  --}}
    @include('inc.school')

    <div class="col-lg-6 col-sm-6">
        <div class="divedittop">
            <small class="nameinedit"> Student- {{$student->name}} </small>
            <a href="{{url('/students')}}/{!!$student->id!!}/edit" class="btn btn-primary editbtn">Edit</a>
        </div>
        <hr class="hredit">
        <img src="{{asset('/storage/image')}}/{{$student->image}}" class="showimage">
        <div class="infostudent">
            <h3>{{$student->name}}</h3>
            <p>{{$student->email}}</p]>
            <p>{{$student->phone}}</p>
        </div>
        <hr>
        <h3>Courses</h3>
        <br>
        <hr>
        @if(count($student->courses)>0)
            @foreach($student->courses as $course)
                <div class="divedittop">
                    <img src="{{asset('/storage/image')}}/{{$course->image}}" class="courserstudentsimage">

                    <small class="coursesstudentslabel">{{$course->name}}</small>
                </div>
                <br><br>
                <hr>


            @endforeach
        @else
            <p>No Courses Found</p>
        @endif


    </div>



    {{--  this closing div for row  --}}
    </div>

@endsection