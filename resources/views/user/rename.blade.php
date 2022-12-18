@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">




            <h1>Rename Character</h1>
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
        <form method="post" action="/rename">
            @csrf
            <select name="char">
                <option value="">Select Character</option>
            @foreach($char as $chars)

                <option value={{$chars->Name}}>{{$chars->Name}}</option>

            @endforeach
            </select>
            <p><input type="text" name="name" placeholder="Choose a new name"></p>
            <p><button class="big">Rename Character</button></p>
        </form>
            @foreach($rename as $values)
            <div class="notification information">
                <div>Information for Rename Character

                    <li><b>Credits for change name</b> - {{$values->credits}}</li>
                </div>
            </div>
            @endforeach
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
