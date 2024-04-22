@extends('blades.header')

@section('title')
F1 | Guys
@endsection

@section('main')


<div class="grid-container">
    <div class="grid-item">

        <h2 style="font-size: 32px; margin-left: 4rem">
            F1 Pilots:
        </h2>

        @foreach($f1pilots as $pilot)

        <div style="display: flex; gap: 1rem; max-width:300px; margin-left: 6rem; align-items: center; justify-content: space-between;">

            <form class="hoverable" id="{{ $pilot->name.$pilot->id }}" method="get" action="{{ route('pilots', ['pilot_id' => $pilot->id]) }}">
                <div onclick="document.getElementById('{{ $pilot->name.$pilot->id }}').submit();">{{ $pilot->name }}</div>
            </form>

        </div>

        @endforeach
    </div>
    <div class="grid-item">
        <h2 style="font-size: 32px; margin-left: 4rem">
            F1 Teams:
        </h2>

        @foreach($f1teams as $team)

        <div style="display: flex; gap: 1rem; max-width:300px; margin-left: 6rem; align-items: center; justify-content: space-between;">

            <form class="hoverable" id="{{ $team->name.$team->id }}" method="get" action="{{ route('teams', ['team_id' => $team->id]) }}">
                <div onclick="document.getElementById('{{ $team->name.$team->id }}').submit();">{{ $team->name }}</div>
            </form>

        </div>

        @endforeach
    </div>
    <div class="grid-item">
        <h2 style="font-size: 32px; margin-left: 4rem">
            F1 Sponsors:
        </h2>

        @foreach($f1sponsors as $sponsor)

        <div style="display: flex; gap: 1rem; max-width:300px; margin-left: 6rem; align-items: center; justify-content: space-between;">

            <form class="hoverable" id="{{ $sponsor->name.$sponsor->id }}" method="get" action="{{ route('sponsors', ['sponsor_id' => $sponsor->id]) }}">
                <div onclick="document.getElementById('{{ $sponsor->name.$sponsor->id }}').submit();">{{ $sponsor->name }}</div>
            </form>

        </div>

        @endforeach
    </div>
</div>
@endsection


<style>
    .hoverable:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* Three columns with equal width */
        grid-gap: 20px;
        /* Gap between grid items */
    }
</style>