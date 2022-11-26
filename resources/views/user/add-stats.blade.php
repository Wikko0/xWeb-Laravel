@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">
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
            <h1>Add Stats</h1>

        <form method="post" action="/add-stats">
            {{csrf_field()}}
            <select name="char">
                <option value="">Select Character</option>
            @foreach($char as $chars)
                <option value={{$chars->Name}}>{{$chars->Name}}: {{$chars->cLevel}} Level, {{$chars->LevelUpPoint}} Points</option>

            @endforeach
            </select>
            <p><input type="number" name="str" placeholder="Strength"></p>
            <p><input type="number" name="agi" placeholder="Dexterity"></p>
            <p><input type="number" name="vit" placeholder="Vitality"></p>
            <p><input type="number" name="ene" placeholder="Energy"></p>
            <p><input type="number" name="com" placeholder="Command"></p>
            <p><button class="big">Add Stats</button></p>
        </form>

    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
