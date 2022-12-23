@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">




            <h1>Reset Stats</h1>
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
        <form method="post" action="/resetstats">
            @csrf
            <select name="char">
                <option value="">Select Character</option>
            @foreach($char as $chars)

                <option value={{$chars->Name}}>{{$chars->Name}}</option>

            @endforeach
            </select>
            <p><button class="big">Reset Stats</button></p>
        </form>
            @foreach($resetstats as $values)
            <div class="notification information">
                <div>Information for Reset Stats

                    <li><b>Credits for Reset Stats</b> - {{$values->credits}}</li>
                    <li><b>Zen for Reset Stats</b> - {{$values->zen}}</li>
                    <li><b>Required Level</b> - {{$values->level}}</li>
                    <li><b>Required Resets</b> - {{$values->resets}}</li>
                </div>
            </div>
            @endforeach
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
