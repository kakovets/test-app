@extends('blades.header')

@section('title')
{{ $team->name }}
@endsection

@section('main')

<h2 style="text-align: center; font-size: 32px; ">
    {{ $team->name }} -- Team
</h2>

<div class="item">
    Pilots:
</div>

@foreach($team->pilots as $pilot)

<div class="sponsorForm" style="display: flex; gap: 1rem; max-width:300px; margin-left: 6rem; align-items: center; justify-content: space-between;">

    <form id="{{ $pilot->id }}" method="get" action="{{ route('pilots', ['pilot_id' => $pilot->id]) }}">
        <div onclick="document.getElementById('{{ $pilot->id }}').submit();">{{ $pilot->name }}</div>
    </form>

</div>

@endforeach

@endsection



<style>

    .pilotNameForm:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .sponsorForm:hover {
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