@extends('layouts.app')

@section('content')

    @include('inc.users')


    <div class="col-lg-6 col-sm-6">

        <div class="divedittop">
            <h3>Edit {{$user->name}}</h3>
        </div>
        <hr class="hredit">
        @if(Auth::user()->id==$user->id && Auth::user()->role == "manager")
        @elseif($user->role=="owner")
        @else
            {!! Form::open(['action'=>['UsersController@destroy',$user->id],'method'=>'POST','class'=>'pull-right deletebutton','onsubmit'=>'return confirm("Are you sure want to Delete?")']) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif

        {!! Form::open(['action'=>['UsersController@update',$user->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
            {{Form::hidden('_method','PUT')}}
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus
                   placeholder="Name">
            @if ($errors->has('name'))
                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="phone" class="control-label">Phone-Number</label>
            <input id="phone" type="text" class="form-control" name="phone" value="{{$user->phone}}" required
                   placeholder="Phone-Number">

        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address</label>


            <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required
                   placeholder="E-mail Address">

            @if ($errors->has('email'))
                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>


            <input id="password" type="password" class="form-control" name="password" required placeholder="Password"
                   value="{{$user->password}}">

            @if ($errors->has('password'))
                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
            @endif

        </div>

        <div class="form-group">
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                   placeholder="Confirm Password" value="{{$user->password}}">

        </div>

        <div class="form-group">
            <label>Role:</label>
            <p>{{$user->role}}</p>

            {{--  <label for="owner" class="control-label">Owner:</label>
            <input id="owner" name="role" type="radio" value="owner">
            <label for="manager" class="control-label">Manager:</label>
            <input id="manager" name="role" type="radio" value="manager">
            &nbsp;	&nbsp;	&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            <label for="sales" class="control-label">Sales:</label>
            <input id="sales" name="role" type="radio" value="sales" checked>  --}}

            @if(Auth::user()->id==$user->id && Auth::user()->role == "manager")
                <label for="manager" class="control-label">Manager:</label>
                <input id="manager" name="role" type="radio" value="manager" checked>
            @elseif($user->role=="owner")
                <label for="owner" class="control-label">Owner:</label>
                <input id="owner" name="role" type="radio" value="owner" checked>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            @elseif($user->role=="manager")
                <label for="manager" class="control-label">Manager:</label>
                <input id="manager" name="role" type="radio" value="manager" checked>
                &nbsp;    &nbsp;    &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="sales" class="control-label">Sales:</label>
                <input id="sales" name="role" type="radio" value="sales">
            @elseif($user->role=="sales")
                <label for="manager" class="control-label">Manager:</label>
                <input id="manager" name="role" type="radio" value="manager">
                &nbsp;    &nbsp;    &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="sales" class="control-label">Sales:</label>
                <input id="sales" name="role" type="radio" value="sales" checked>
            @endif
        </div>

        <div class="form-group">
            <label for="image" class="control-label">Image:</label>

            <input type="file" id="image" name="image">
            <hr>

            <img src="{{asset('/storage/image')}}/{{$user->image}}" class="editimageuser">
        </div>


        </form>

    </div>



    {{--  this closing div for row  --}}
    </div>

@endsection