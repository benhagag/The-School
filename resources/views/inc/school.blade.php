<div class="row">

    <div class="well col-lg-3 col-sm-3 stucour">

        <h2>Students<a href="{{url('/students/create')}}"<span class="glyphicon glyphicon-plus plus"></span></a></h2>
        <hr class="hredit">
        @if(count($students)>0)
            <ul>
                @foreach($students as $studentone)


                    <li>
                        <img src="{{asset('/storage/image')}}/{{$studentone->image}}" class="mainimage">

                        <div class="mainnamephone">
                            <h4><a href="{{url('/students')}}/{!!$studentone->id!!}">{{$studentone->name}}</a></h4>
                            <small>{{$studentone->phone}}</small>
                        </div>
                    </li>
                    <hr>







                @endforeach
            </ul>

        @else
            <p> no students found! </p>

        @endif
    </div>

    <div class="well col-lg-3 col-sm-3 stucour">

        <h2>Courses<a href="{{url('/courses/create')}}"
            @if (Auth::user()->role=="owner"||Auth::user()->role=="manager")
                <span class="glyphicon glyphicon-plus plus"></span>
                @endif
                </a></h2>
        <hr class="hredit">

        @if(count($courses)>0)
            <ul>
                @foreach($courses as $courseone)
                    <li>
                        <img src="{{asset('/storage/image')}}/{{$courseone->image}}" class="mainimage">
                        <div class="mainnamephone">
                            <h4><a href="{{url('/courses')}}/{!!$courseone->id!!}">{{$courseone->name}}</a></h4>
                            <small>Total {{$courseone->students()->count()}} Students</small>

                        </div>
                    </li>
                    <hr>



                @endforeach
            </ul>
            {{--  {{$courses->links()}}  --}}
        @else

            <p> no courses found! </p>

        @endif
    </div>