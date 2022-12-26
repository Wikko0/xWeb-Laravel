@extends('layout.default')

@section('content')

@include('block.rightblock')
@php
use \App\Http\Controllers\doController;
@endphp
<main class="content">
    <h1>Profile of {{$user->Name}}</h1>

<div class="{{$background}}">
    <div class="user-panel">
        <ul>
            <li>Name <span>{{$user->Name}}</span> </li>
            <li>Guild <span>{{$guild->G_Name ?? 'No Guild'}}</span> </li>
            <li>Class <span>{{$class}}</span> </li>
            <li>Level <span>{{$user->cLevel}}</span> </li>
            <li>Resets <span>{{$user->Resets}}</span> </li>
            <li>Grand Resets <span>{{$grandresets->gresets ?? 0}}</span> </li>
            <li>Status @if($status == 'Online') <span style="color: #00bb00"> Online </span> @else <span style="color: #7c151f"> Offline </span> @endif</li>
            <li>Location: {!! $map !!} ({{$user->MapPosX}},{{$user->MapPosY}}) <span>Kills: {{$user->PkCount}}</span> </li>
        </ul>
    </div>
</div>


    </div><!-- content-p -->
</main><!-- content -->
</div><!-- container -->
</div><!-- block-links -->
@endsection
