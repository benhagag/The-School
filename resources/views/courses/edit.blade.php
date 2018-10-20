@extends('layouts.app')

@section('content')

    {{--  this is is the main school page courses and students  --}}
    @include('inc.school')

    <div class="col-lg-6 col-sm-6">

        <div class="divedittop">
            <h3>Edit {{$course->name}}</h3>
        </div>
        <hr class="hredit">

        {!! Form::open(['action'=>['CoursesController@destroy',$course->id],'method'=>'POST','class'=>'pull-right deletebutton','onsubmit'=>'return confirm("Are you sure want to Delete?")']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}

        {!! Form::open(['action'=>['CoursesController@update',$course->id],'method'=>'Post','enctype'=>'multipart/form-data']) !!}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        <div class="form-group">
            {{Form::label('name','Name')}}

            {{--name & value &class &placeholder--}}
            {{Form::text('name',$course->name,['class'=>'form-control','placeholder'=>'Name'])}}

        </div>

        <div class="form-group">
            {{Form::label('description','Description')}}

            {{--name & value &class &placeholder--}}
            {{Form::textarea('description',$course->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Description'])}}

        </div>

        <div class="form-group divimage">
            {{Form::hidden('_method','PUT')}}
            {{Form::label('image','Image',['class'=>'control-label'])}}
            {{Form::file('image',['class'=>'formfile'])}}
            <img src="{{asset('/storage/image')}}/{{$course->image}}" class="editimage">
            <hr>
        </div>
        {!! Form::close() !!}
        <h3>total {{$course->students()->count()}} students taking this course</h3>


    </div>



    {{--  this closing div for row  --}}
    </div>

@endsection