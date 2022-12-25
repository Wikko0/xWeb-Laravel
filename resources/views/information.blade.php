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

            <li>Server name <span>2</span> </li>
            <li>Version <span>2</span> </li>
            <li>Experience <span>2</span> </li>
            <li>Drop Rate <span>2</span> </li>
            <li>Zen Drop <span>2</span> </li>
            <li>Points Per Level <span>2</span> </li>

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
