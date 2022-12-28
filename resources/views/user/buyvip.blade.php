@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">




            <h1>Buy VIP</h1>
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
        @foreach($vip_pack as $value)
            <form action="/getvip" method="post">

                @csrf
                <input type="hidden" name="days" value="{{$value->days}}">
                <input type="hidden" name="credits" value="{{$value->credits}}">
                <div class="buyvip-heading">
                    <h4 class="buyvip-title">

                        <span>{{$value->name}}</span>
                        <span>{{$value->days}} Days</span>
                        <span>{{$value->credits}} Credits</span>
                        <span> <button type="submit" class="buyvipbutton">Get VIP</button> </span>
                    </h4>
                </div>
            </form>
        @endforeach
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
