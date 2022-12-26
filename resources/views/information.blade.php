@extends('layout.default')

@section('content')

@include('block.rightblock')
@php
use \App\Http\Controllers\doController;
@endphp
<main class="content">
    <h1>Information</h1>

@foreach($information as $values)
    <div class="information-table">
        <ul>
            <li>
                SERVER INFORMATION
            </li>

            <li>Server name <span>{{$values->sname}}</span> </li>
            <li>Version <span>{{$values->version}}</span> </li>
            <li>Experience <span>{{$values->experience}}</span> </li>
            <li>Drop Rate <span>{{$values->droprate}}</span> </li>
            <li>Zen Drop <span>{{$values->zenrate}}</span> </li>
            <li>Points Per Level <span>{{$values->ppl}}</span> </li>

        </ul>

    </div>
    @endforeach
    <div class="information-table">
        <ul>
            <li>
                STATISTICS
            </li>

            <li>Total Accounts <span>{{$countacc}}</span> </li>
            <li>Total Characters <span>{{$countchar}}</span> </li>
            <li>Total Guilds <span>{{$countguild}}</span> </li>
            <li>Players Online <span>{{$countonline}}</span> </li>


        </ul>

    </div>


    </div><!-- content-p -->
</main><!-- content -->
</div><!-- container -->
</div><!-- block-links -->
@endsection
