@extends('layout.default')

@section('content')

@include('block.rightblock')
@php
use \App\Http\Controllers\doController;
@endphp
<main class="content">
    <h1>Ranking</h1>
    <form method="get" action="/ranking">
    <div class="content-character">
        <div class="rank-block-s flex">
            <select name='searchby' onchange='this.form.submit();'>
                <option>Select the rank</option>
                <option value="0">Dark Wizzard</option>
                <option value="1">Soul Master</option>
                <option value="3">Grand Master</option>
                <option value="16">Dark Knight</option>
                <option value="17">Blade Knight</option>
                <option value="19">Blade Master</option>
                <option value="32">Fairy Elf</option>
                <option value="33">Muse Elf</option>
                <option value="35">High Elf</option>
                <option value="48">Magic Gladiator</option>
                <option value="50">Magic Knight</option>
                <option value="64">Dark Lord</option>
                <option value="66">Lord Emperor</option>
                <option value="80">Summoner</option>
                <option value="81">Bloody Summoner</option>
                <option value="98">Rage Fighter</option>
                <option value="98">Fist Master</option>
            </select>
            </form>
            <form method="get" action="/ranking">
            <div class="search-b">
                <input type="search" name="search" placeholder="Search a character" class="sh"> <button class="sh-button"></button>
            </div>
        </div>
        </form>
        <div class="ranking-table">
            <h3>Ranking of Resets</h3>
            <table>
                <tbody>
                <tr>
                    <td>Rank</td> <td>Nick</td> <td>Character</td> <td>Guild</td> <td>Resets</td>
                </tr>


                {!! $output !!}

                </tbody>
            </table>



            {!! $select->links('others.pagination') !!}

        </div>
    </div><!-- content-p -->
</main><!-- content -->
</div><!-- container -->
</div><!-- block-links -->
@endsection
