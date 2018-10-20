<?php
// dd($courses2);
?>
@extends('layouts.app')

@section('content')

    {{--  this is is the main school page courses and students  --}}
    @include('inc.school')

    <div class="col-lg-6 col-sm-6">

        <div class="divedittop">
            <h3>Edit {{$student->name}}</h3>
        </div>
        <hr class="hredit">
        {!! Form::open(['action'=>['StudentsController@destroy',$student->id],'method'=>'POST','class'=>'pull-right deletebutton','onsubmit'=>'return confirm("Are you sure want to Delete?")']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}

        {!! Form::open(['action'=>['StudentsController@update',$student->id],'method'=>'Post','enctype'=>'multipart/form-data']) !!}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        <div class="form-group">
            {{Form::label('name','Name')}}

            {{--name & value &class &placeholder--}}
            {{Form::text('name',$student->name,['class'=>'form-control','placeholder'=>'Name'])}}

        </div>

        <div class="form-group">
            {{Form::label('phone','Phone')}}

            {{--name & value &class &placeholder--}}
            {{Form::text('phone',$student->phone,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Phone-number'])}}

        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}

            {{--name & value &class &placeholder--}}
            {{Form::email('email',$student->email,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Email'])}}
            {{Form::hidden('_method','PUT')}}
        </div>
        <div class="form-group divimage">
            {{Form::label('image','Image',['class'=>'control-label'])}}
            {{Form::file('image',['class'=>'formfile'])}}
            <img src="{{asset('/storage/image')}}/{{$student->image}}" class="editimage">
            <hr>
            <h2>courses</h2>

            <hr>

            @if(count($courses)>0)
                @foreach($courses as $course)
                    <div class="form-group">
                        @if(in_array($course->id,$courses2))

                            <input name="courses[]" $courses null type="checkbox" value="{{$course->id}}" checked>
                            <img src="{{asset('/storage/image')}}/{{$course->image}}" class="courserstudentsimage">
                            <label for="{{$course->name}}"
                                   class="control-label coursesstudentslabel">{{$course->name}}</label>

                        @else
                            <input name="courses[]" $courses null type="checkbox" value="{{$course->id}}">
                            <img src="{{asset('/storage/image')}}/{{$course->image}}" class="courserstudentsimage">
                            <label for="{{$course->name}}"
                                   class="control-label coursesstudentslabel">{{$course->name}}</label>
                        @endif
                    </div>
                @endforeach
            @else
                <p>No Courses Found</p>
            @endif

            {!! Form::close() !!}


        </div>


        {{--  this closing div for row  --}}
    </div>

@endsection