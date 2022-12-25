@extends('layout.default')

@section('content')

@include('block.rightblock')
@php
use \App\Http\Controllers\doController;
@endphp
<main class="content">
    <h1>Information</h1>


    <div class="information-table">
        <ul>
            <li>
                SERVER INFORMATION
            </li>

            <li>Server name <span>xWeb</span> </li>
            <li>Version <span>Season VI</span> </li>
            <li>Experience <span>100x</span> </li>
            <li>Drop Rate <span>20%</span> </li>
            <li>Zen Drop <span>10%</span> </li>
            <li>Points Per Level <span>5/7</span> </li>

        </ul>

    </div>

    <div class="information-table">
        <ul>
            <li>
                STATISTICS
            </li>

            <li>Total Accounts <span>2</span> </li>
            <li>Total Characters <span>2</span> </li>
            <li>Total Guilds <span>2</span> </li>
            <li>Players Online <span>2</span> </li>
            <li>Online Record <span>2</span> </li>


        </ul>

    </div>


    </div><!-- content-p -->
</main><!-- content -->
</div><!-- container -->
</div><!-- block-links -->
@endsection
