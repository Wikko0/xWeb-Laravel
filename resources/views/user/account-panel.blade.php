@extends('layout.default')

@section('content')

    @include('block.rightblock')


    @if(@session('User'))
        <main class="content">

            <h1>Account Panel</h1>
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
            <div class="block-account-panel">


                <div id="ucp_info">
                    <div class="half">
                        <table>
                            <tbody>
                            <tr>
                                <td><img src="{{asset('images/icons/user.png')}}">
                                </td>
                                <td>Account</td>
                                <td>{{$UserInfo->memb___id}}</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images/icons/email.png')}}">
                                </td>
                                <td>Email</td>
                                <td>{{$UserInfo->mail_addr}}</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images/icons/rank.png')}}">
                                </td>
                                <td>Rank</td>
                                <td>{{$rank}}</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images/icons/vip.png')}}">
                                </td>
                                <td>Vip</td>
                                <td>{!! $vip !!}</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images/icons/expires.png')}}">
                                </td>
                                <td>Expires</td>
                                <td>{{$vipcheck->expires ?? 'Expired'}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="half">
                        <table>
                            <tbody>
                            <tr>
                                <td><img src="{{asset('images/icons/date.png')}}">
                                </td>
                                <td>Member Since</td>
                                <td>{{date('Y-m-d', strtotime($UserInfo->reg_date))}}</td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('images/icons/money.png')}}">
                                </td>
                                <td>Credits</td>
                                <td><span style="color: #00bb00">{{$credits->credits??'0'}}</span> (<a href="/buycredits">Buy Now</a>)</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div style="clear:both;"></div>
                </div>

                <div class="separate"></div>
                @if($output)
                    <div class="mychar-table">
                        <table>
                            <tbody>
                            <tr>
                                <td>Rank</td>
                                <td>Nick</td>
                                <td>Character</td>
                                <td>Level</td>
                                <td>Resets</td>
                                <td>Strength</td>
                                <td>Agility</td>
                                <td>Vitality</td>
                                <td>Energy</td>
                                <td>Kills</td>
                            </tr>


                            {!! $output !!}
                            </tbody>
                        </table>


                    </div>

                    <div class="separate"></div>
                @endif
                <div id="character-info">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <a href="/reset">
                                    <div>
                                        <ul>
                                            <p>Reset</p>

                                            <span>Reset your character level</span> <br>&nbsp;
                                        </ul>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="/grand-reset">
                                    <div>
                                        <ul>
                                            <p>Grand Reset</p>

                                            <span>Grand Reset your character</span> <br>&nbsp;
                                        </ul>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/add-stats">
                                    <div>
                                        <ul>

                                            <p>Add Stats</p>

                                            <span>Add level up points. Str. Agi. Vit. etc</span> <br>&nbsp;
                                        </ul>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="/clearpk">
                                    <div>
                                        <ul>
                                            <p>PK Clear</p>

                                            <span>Clearing the hero's kills </span> <br>&nbsp;

                                        </ul>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/rename">
                                    <div>
                                        <ul>

                                            <p>Rename Character</p>

                                            <span>Change character name</span> <br>&nbsp;
                                        </ul>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="/resetstats">
                                    <div>
                                        <ul>
                                            <p>Reset Character Stats</p>

                                            <span>Fix added stats </span> <br>&nbsp;

                                        </ul>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="separate"></div>

                <div id="paid-info">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <a href="/buycredits">
                                    <div>
                                        <ul>
                                            <p><ul>Buy Credits</ul></p>

                                            <span>Get credits to use the paid plugins</span> <br>&nbsp;
                                        </ul>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="/buyvip">
                                    <div>
                                        <ul>
                                            <p><ul>Buy VIP</ul></p>

                                            <span>Get VIP for extra exp,drop and etc.</span> <br>&nbsp;
                                        </ul>
                                    </div>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <a href="/logout">
                    <button class="big">Logout</button>
                </a>
            </div><!-- block-info-center -->
        </main><!-- content -->
    @else
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
                <p>
                    <button class="big">Login</button>
                </p>
            </form>
        </main><!-- content -->
        @endif
        </div><!-- container -->
        </div><!-- block-links -->
@endsection
