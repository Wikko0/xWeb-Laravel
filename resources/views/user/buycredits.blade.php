@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">




            <h1>Buy Credits</h1>
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
        @foreach($paypal_pack as $value)
            <form action="/pay" method="post">

                @csrf
                <input type="hidden" name="amount" value="{{$value->amount}}">
                <input type="hidden" name="credits" value="{{$value->credits}}">
                <div class="paypal-heading">
                    <h4 class="paypal-title">

                        <span>{{$value->name}}</span>
                        <span>{{$value->credits}} Credits</span>
                        <span> <button type="submit" class="paybutton">{{$value->amount}}$ BUY</button> </span>
                    </h4>
                </div>
            </form>
        @endforeach
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
