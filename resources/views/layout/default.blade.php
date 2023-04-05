<!DOCTYPE html>
<html lang="en">
<head>
    @foreach($admin as $head)
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <title>{{$head->stitle}}</title>
    <meta name="keywords" content="{{$head->skeywords}}" />
    <meta name="description" content="{{$head->sdescription}}" />
    <link rel="favicon" href="{{asset('favicon.ico')}}" />
    <meta name="viewport" content="width=1280, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/countdown.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="{{asset('js/countdown-events.js')}}"></script>
    <script src="{{asset('js/countdown-boss.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    @endforeach
</head>

<body>
@include('others.modals')

<div class="top-panel">
    <div class="container top-container flex-c">
        <a href="/" class="bright"><img src="{{asset('/images/logo-white.png')}}" alt="Logo"></a>
        <ul class="menu">
            <li><a href="/news">News</a></li>
            <li class="menu-download"><a href="/download">Download</a></li>
            <li><a href="/ranking">Ranking</a></li>
            <li><a href="/register">Register</a></li>

            @if(session('User'))
            <li><a href="/account-panel" class="acc-panel flex-c">

                    My Account</a></li>
        </ul>
        @else
            <li><a href="#modal5" class="acc-panel flex-c open_modal">

                    Sing In</a></li>
            </ul>
        @endif


        <a href="/download" class="top-download-button flex-c-c bright">Download</a>
    </div><!-- container -->
</div>
@foreach($announce as $values)
    @if($values->status==1)
<!-- Announce Start -->
<script src="{{asset('js/countdown.js')}}"></script>
<script type="text/javascript">var newdate = '{{$values->date}}';</script>
<div class="countdowntitle">
    <p>{{$values->title}}</p>
    <div id="timer"></div>
</div>
    @else
        ''
    @endif
<!-- Announce End -->
@endforeach

<header class="header">

    <div class="container header-container flex-c-c">
        <div class="online flex-c">

            <div class="onlineBlock onlineBlock-purple">
                <div class="oBlock">
                    <div class="online-text">
                        {{$onlinePlayers}}
                    </div>
                    <div class="online-rait">
                        Online
                    </div>
                </div>
                <div class="circle">
                    <div class="circlestat" data-dimension="205" data-width="10" data-fontsize="12" data-percent="{{ ($onlinePlayers / 100) * 50  }}" data-fgcolor="#A466CE" data-bgcolor="rgba(0, 0, 0, 0.3)"></div>
                </div>
            </div><!--onlineBlock-->

        </div><!--online-->
    </div><!-- container -->



</header><!-- header -->

@yield('content')

<footer class="footer">
    <div class="container footer-container flex-c">
        <a href="/" class="f-logo"><img src="{{asset('/images/logo-white.png')}}" alt="Logo"></a>
        <div class="copyright">
            Copyright {{ date('Y') }} © xWeb. <br>
            <span>© WEBZEN, INC. All rights reserved. MU Online are trademark, services marks, or registered marks of WEBZEN, INC.</span>
        </div>
    </div><!-- container -->
</footer><!-- .footer -->




<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/global.js')}}"></script>
<script type="text/javascript">
    var xWebConfig = {
        timers: <?php echo json_encode($timers);?>
    };
</script>
<script type="text/javascript">
    var xWebConfigBoss = {
        timers: <?php echo json_encode($bosstimers);?>
    };
</script>
<script>
    $(document).on('ready', function() {
        $(".slider-top").slick({
            dots: true,
            arrows: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000
        });
        $(".slider-bottom").slick({
            dots: false,
            arrows: true,
            infinite: true
        });
    });
</script>
<script src="{{asset('js/circle-js.js')}}"></script>
</body>
</html>
