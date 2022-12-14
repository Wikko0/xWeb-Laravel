@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">




            <h1>Reset Character</h1>
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
        <form method="post" action="/reset">
            @csrf
            <select name="char">
                <option value="">Select Character</option>
            @foreach($char as $chars)
                <option value={{$chars->Name}}>{{$chars->Name}}: {{$chars->cLevel}} Level</option>

            @endforeach
            </select>
            <p><button class="big">Reset Character</button></p>
        </form>
            @foreach($reset as $values)
            <div class="notification information">
                <div>Information for Reset character
                    <li><b>Reset level</b> - {{$values->level}}</li>
                    <li><b>Reset Zen</b> - {{$values->zen}} zen x <i>Reset Number</i></li>
                    <li><b>Reset Points [Blade Knight]</b> - {{$values->bkpoints}}</li>
                    <li><b>Reset Points [Soul Master]</b> - {{$values->smpoints}}</li>
                    <li><b>Reset Points [Muse Elf]</b> - {{$values->elfpoints}}</li>
                    <li><b>Reset Points [Magic Gladiator]</b> - {{$values->mgpoints}}</li>

                    <li><b>Reset Points [Dark Lord]</b> - {{$values->dlpoints}}</li>
                    <li><b>Reset Points [Rage Fighter]</b> - {{$values->rfpoints}}</li>
                    <li><b>Reset Points [Grow Lancer]</b> - {{$values->glpoints}}</li>

                    <li><b>Max Reset</b> - {{$values->maxresets}}</li>
                    <li><b>Check character for items</b> - No</li>
                    <li><b>Clear Inventory</b> - No</li>
                    <li><b>Clear Magic List</b> - No</li>
                    <li><b>Clear Quest</b> - No</li>
                </div>
            </div>
            @endforeach
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
