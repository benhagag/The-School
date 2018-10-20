@extends('layouts.app')

@section('content')
    {{--  this is is the main school page courses and students  --}}
    @include('inc.school')

    <div class="col-lg-6 col-sm-6">

        <div class="divedittop">
            <h3>Create Course</h3>
        </div>
        <hr class="hredit">

        {!! Form::open(['action'=>'CoursesController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        <div class="form-group">
            {{Form::label('name','Name')}}

            {{--name & value &class &placeholder--}}
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}

        </div>

        <div class="form-group">
            {{Form::label('description','Description')}}

            {{--name & value &class &placeholder--}}
            {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}

        </div>
        <div class="form-group divimage">
            {{Form::label('image','Image',['class'=>'control-label'])}}


            {{Form::file('image',['class'=>'formfile'])}}

        </div>

        {!! Form::close() !!}


    </div>



    {{--  this closing div for row  --}}
    </div>

@endsection