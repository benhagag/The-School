@extends('layouts.app')

@section('content')

    @include('inc.users')


    <div class="col-lg-6 col-sm-6">

        <div class="divedittop">
            <h3>Create User</h3>
        </div>
        <hr class="hredit">
        {{--  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">  --}}
        {!! Form::open(['action'=>'UsersController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus
                   placeholder="Name">
            @if ($errors->has('name'))
                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="phone" class="control-label">Phone-Number</label>
            <input id="phone" type="text" class="form-control" name="phone" required placeholder="Phone-Number">

        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address</label>


            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                   placeholder="E-mail Address">

            @if ($errors->has('email'))
                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
            @endif

        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>


            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
            @endif

        </div>

        <div class="form-group">
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                   placeholder="Confirm Password">

        </div>

        <div class="form-group">
            <label>Role:</label>

            <br>
            {{--  <label for="owner" class="control-label">owner:</label>
            <input id="owner" name="role" type="radio" value="owner">  --}}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="manager" class="control-label">Manager:</label>
            <input id="manager" name="role" type="radio" value="manager">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            <label for="sales" class="control-label">Sales:</label>
            <input id="sales" name="role" type="radio" value="sales" checked>
        </div>

        <div class="form-group">
            <label for="image" class="control-label">Image:</label>
            <input type="file" id="image" name="image">

        </div>


        </form>

    </div>



    {{--  this closing div for row  --}}
    </div>

@endsection