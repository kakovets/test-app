@extends('blades.header')

@section('title')
{{ $pilot->name }}
@endsection

@section('main')

<h2 style="text-align: center; font-size: 32px; ">
    {{ $pilot->name }}
</h2>

<div class="item">
    <form class="hoverable" id="teamID" method="get" action="{{ route('teams', ['team_id' => $pilot->team->id]) }}">
        <div onclick="document.getElementById('teamID').submit();">Team = {{ $pilot->team->name }}</div>
    </form>
</div>

<div class="item">
    Age = {{ $pilot->age }}
</div>
<div class="item">
    Wins = {{ $pilot->wins }}
</div>
<div class="item">
    Sponsors:
</div>

@foreach($pilot->sponsors as $sponsor)

<div class="hoverable" style="display: flex; gap: 1rem; max-width:300px; margin-left: 6rem; align-items: center; justify-content: space-between;">
    <form id="{{ $sponsor->id }}" method="get" action="{{ route('sponsors', ['sponsor_id' => $sponsor->id]) }}">
        <div onclick="document.getElementById('{{ $sponsor->id }}').submit();">{{ $sponsor->name }}</div>
    </form>
</div>

@endforeach

<div style="text-align: center; ">
    <form method="POST" action="{{ route('inc_wins', ['id' => $pilot->id]) }}">
        @csrf
        <button type="submit">+ Wins</button>
    </form>

    <form method="POST" action="{{ route('dec_wins', ['id' => $pilot->id]) }}">
        @csrf
        <button type="submit">- Wins</button>
    </form>

    @if ($pilot->wins >= 20)
    <div class="cool-status super-cool">Super cool guy</div>
    @elseif ($pilot->wins >= 5)
    <div class="cool-status cool">Cool guy</div>
    @else
    <div class="cool-status not-cool">Not cool guy</div>
    @endif
</div>

@endsection



<style>
    .hoverable:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .item {
        font-size: 26;
        margin: 2rem 5rem;
        display: flex;
    }

    .cool-status {
        margin-top: 1rem;
        padding: 0.5rem;
        border-radius: 0.25rem;
        font-weight: bold;
    }

    .super-cool {
        /* Green */
        background-color: #28a745;
        color: #fff;
    }

    .cool {
        /* Blue */
        background-color: #17a2b8;
        color: #fff;
    }

    .not-cool {
        /* Red */
        background-color: #dc3545;
        color: #fff;
    }
</style>