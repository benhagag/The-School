<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <img src="{{asset('/images/schoolbulding.jpg')}}" class="mainnavimage">
        </div>


        @if (!Auth::guest())

            <ul class="nav navbar-nav">
                <li class="lischooladmin"><a href="{{ url('/school') }}"><u>School</u></a></li>


                @if(Auth::user()->role == "owner" || Auth::user()->role == "manager")
                    <li class="lischooladmin"><a href="{{ url('/users') }}"><u> Administration</u></a></li>
                @endif
            </ul>
        @endif

    <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right" class="ulusernav">
            <!-- Authentication Links -->


            @if (!Auth::guest())



                <li><p class="pname">{{ Auth::user()->name }}, {{ Auth::user()->role}} </p>
                    <a class="linknavuser" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <u> Logout</u>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li><img src="{{asset('/storage/image')}}/{{Auth::user()->image}}" class="navimageuser"></li>


        </ul>

        @endif


    </div>
</nav>
