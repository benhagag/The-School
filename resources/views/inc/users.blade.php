<div class="row">

    <div class="well col-lg-6 col-sm-6 stucour">
        <h2>Users<a href="{{url('/users/create')}}"<span class="glyphicon glyphicon-plus plususer"></span></a></h2>
        <hr class="hredit">


        @if(count($usersmanager)>0 && Auth::user()->role != "owner")
            <ul>
                @foreach($usersmanager as $usernowner)
                    <li>
                        <img src="{{asset('/storage/image')}}/{{$usernowner->image}}" class="mainimage">
                        <div class="mainnamephone">
                            <h3><a href="{{url('/users')}}/{!!$usernowner->id!!}">{{$usernowner->name}}
                                    , {{$usernowner->role}}</a></h3>
                            <small>{{$usernowner->phone}}</small>
                            <br>
                            <small>{{$usernowner->email}}</small>
                        </div>
                    </li>
                    <hr>
                @endforeach
            </ul>




        @elseif(count($users)>0 && Auth::user()->role == "owner" )
            <ul>
                @foreach($users as $userone)
                    <li>
                        <img src="{{asset('/storage/image')}}/{{$userone->image}}" class="mainimage">
                        <div class="mainnamephone">
                            <h3><a href="{{url('/users')}}/{!!$userone->id!!}">{{$userone->name}}
                                    , {{$userone->role}}</a></h3>
                            <small>{{$userone->phone}}</small>
                            <br>
                            <small>{{$userone->email}}</small>
                        </div>
                    </li>
                    <hr>
                @endforeach
            </ul>


        @else
            <p> no users found! </p>

        @endif
    </div>