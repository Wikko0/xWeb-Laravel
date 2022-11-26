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
                <h1>Login</h1>
                <form method="post" action="/register">
                   @csrf
                    <p><input type="text" name="login" placeholder="Login"></p>
                    <p><input type="text" name="mail" placeholder="E-mail"></p>
                    <p><input type="text" name="c-mail" placeholder="Confirm E-mail"></p>
                    <p><input type="password" name="pass" placeholder="Password"></p>
                    <p><input type="password" name="c-pass" placeholder="Confirm password"></p>
                    <p class="check"><input type="checkbox" name="checkbox" class="checkbox" id="checkbox" value="1"/>
                        <label for="checkbox"></label> I agree with the terms of use of the server</p>
                    <p><button class="big">Confirm register</button></p>
                </form>
            </main><!-- content -->
        </div><!-- container -->
    </div><!-- block-links -->
@endsection
