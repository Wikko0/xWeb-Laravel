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

        @foreach($output as $op)
        {!! $op !!}
        @endforeach

    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
