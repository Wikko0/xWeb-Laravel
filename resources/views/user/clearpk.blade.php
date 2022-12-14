@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">




            <h1>Clear PK</h1>
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
        <form method="post" action="/clearpk">
            @csrf
            <select name="char">
                <option value="">Select Character</option>
            @foreach($char as $chars)

                <option value={{$chars->Name}}>{{$chars->Name}}: {{$pk->pklevel($chars->PkLevel)}}</option>

            @endforeach
            </select>
            <p><button class="big">Clear PK</button></p>
        </form>
            @foreach($pkclear as $values)
            <div class="notification information">
                <div>Information for PK Clear

                    <li><b>Zen per kill</b> - {{$values->zen}}</li>
                </div>
            </div>
            @endforeach
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
