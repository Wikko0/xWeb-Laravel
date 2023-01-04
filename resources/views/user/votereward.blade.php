@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">




            <h1>Vote Reward</h1>
        @if(session('success'))
            <div class="notification success">

                <div>
                    <li>{{session('success')}}</li>

                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="notification error">
                <div>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>
        @endif


                @foreach($vote as $value)
                    <form action="/vote-reward" method="post">

                        @csrf
                        <input type="hidden" name="id" value="{{$value->id}}">
                        <input type="hidden" name="zen" value="{{$value->zen}}">
                        <input type="hidden" name="credits" value="{{$value->credits}}">
                        <input type="hidden" name="time" value="{{$value->time}}">
                        <div class="vote-heading">
                            <h4 class="vote-title">

                                <span><img src="images/{{$value->image}}" width="80px;" height="50px;"></span>
                                <span>{{$value->credits}} Credits</span>
                                <span>{{$value->zen}} Zen</span>
                                <span>{{$value->time}} Time</span>
                                <span> <button type="submit" class="votebutton">VOTE</button> </span>
                            </h4>
                        </div>
                    </form>
                @endforeach


    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
