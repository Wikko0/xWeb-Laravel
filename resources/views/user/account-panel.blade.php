@extends('layout.default')

@section('content')

    @include('block.rightblock')


    @if(@session('User'))
    <main class="content">

        <h1>Account Panel</h1>

        <div class="block-account-panel">


            <div id="ucp_info">
                <div class="half">
                    <table>
                        <tbody><tr>
                            <td><img src="images/icons/user.png">
                            </td>
                            <td>Account</td>
                            <td>{{$UserInfo->memb___id}}</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/email.png">
                            </td>
                            <td>Email</td>
                            <td>{{$UserInfo->mail_addr}}</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/award_star_bronze_1.png">
                            </td>
                            <td>Rank</td>
                            <td>User</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/server.png">
                            </td>
                            <td>Server</td>
                            <td>***</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/shield.png">
                            </td>
                            <td>Vip</td>
                            <td>None (<a href="https://avroramu.com/shop/vip">Buy Now</a>)</td>
                        </tr>
                        </tbody></table>
                </div>
                <div class="half">
                    <table>
                        <tbody><tr>
                            <td><img src="images/icons/date.png">
                            </td>
                            <td>Member Since</td>
                            <td>{{date('Y-m-d', strtotime($UserInfo->reg_date))}}</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/shield.png">
                            </td>
                            <td>Last Login</td>
                            <td>{{date('Y-m-d', strtotime($UserInfo->reg_date))}}</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/ip.png">
                            </td>
                            <td>Register IP</td>
                            <td>{{$UserInfo->reg_ip}}</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/ip.png">
                            </td>
                            <td>Current Ip</td>
                            <td>{{Request::ip()}}</td>
                        </tr>
                        <tr>
                            <td><img src="images/icons/lightning.png">
                            </td>
                            <td>Vip Expires</td>
                            <td>Expired</td>
                        </tr>
                        </tbody></table>
                </div>
                <div style="clear:both;"></div>
            </div>


            <div id="character-info">
                <table>
                    <tbody>
                    <tr>
                        <td>
                            <div>
                                <ul>
                                    <li>
                                        <a href="reset">
                                            <p>Reset</p>
                                        </a>
                                        Reset your character level                                                <br>&nbsp;
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div>
                                <ul>
                                    <li>
                                        <a href="grand-reset">
                                            <p>Grand Reset</p>
                                        </a>
                                        Grand Reset your character                                                <br>&nbsp;
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <ul>
                                    <li>
                                        <a href="add-stats">
                                            <p>Add Stats</p>
                                        </a>
                                        Add level up points. Str. Agi. Vit. etc                                                <br>&nbsp;
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div>
                                <ul>
                                    <li>
                                        <a href="/clearpk">
                                            <p>PK Clear</p>
                                        </a>
                                        Clearing the hero's kills                                                 <br>&nbsp;
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <a href="logout"><button  class="big">Logout</button></a>
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
                <p><button class="big">Login</button></p>
            </form>
        </main><!-- content -->
        @endif
    </div><!-- container -->
    </div><!-- block-links -->
@endsection
