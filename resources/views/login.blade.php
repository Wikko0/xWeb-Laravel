@extends('layout.default')

@section('content')

    @include('block.rightblock')

    <main class="content">


            @if(session('errors'))
            <div class="notification error">
                <div>
                    <li>{{session('errors')}}</li>
                </div>
            </div>
                @endif

        <h1>Login</h1>
        <form method="post" action="/login">
            @csrf
            <p><input type="text" name="login" placeholder="Login"></p>
            <p><input type="password" name="password" placeholder="Password"></p>
            <p><button class="big">Login</button></p>
        </form>
    </main><!-- content -->
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
