@extends('layouts.app')

@section('content')

    {{--  this is is the main school page courses and students  --}}
    @include('inc.school')

    <div class="col-lg-6 col-sm-6">

        <div class="divedittop">
            <h3>Create Student</h3>
        </div>
        <hr class="hredit">

        {!! Form::open(['action'=>'StudentsController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        <div class="form-group">
            {{Form::label('name','Name')}}

            {{--name & value &class &placeholder--}}
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}

        </div>

        <div class="form-group">
            {{Form::label('phone','Phone')}}

            {{--name & value &class &placeholder--}}
            {{Form::text('phone','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Phone-number'])}}

        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}

            {{--name & value &class &placeholder--}}
            {{Form::email('email','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Email'])}}

        </div>
        <div class="form-group divimage">
            {{Form::label('image','Image',['class'=>'control-label'])}}
            {{Form::file('image',['class'=>'formfile'])}}
        </div>
        <h2>courses</h2>
        <hr>
        @if(count($courses)>0)
            @foreach($courses as $course)
                <div class="form-group">
                    <input name="courses[]" type="checkbox" value="{{$course->id}}">
                    <label for="{{$course->name}}" class="control-label coursesstudentslabel">{{$course->name}}</label>
                    <img src="{{asset('/storage/image')}}/{{$course->image}}" class="courserstudentsimage">
                    &nbsp;&nbsp;&nbsp;
                    <small> course exist since: {{$course->created_at}}</small>
                    <hr>
                </div>


            @endforeach
        @else
            <p> No Courses Found</p>
        @endif

        {!! Form::close() !!}


    </div>



    {{--  this closing div for row  --}}
    </div>

@endsection 