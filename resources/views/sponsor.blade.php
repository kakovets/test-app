@extends('blades.header')

@section('title')
{{ $sponsor->name }}
@endsection

@section('main')

<h2 style="text-align: center; font-size: 32px; ">
    {{ $sponsor->name }} -- Sponsor
</h2>

<div class="item">
    Pilots:
</div>

@foreach($sponsor->pilots as $pilot)

<div class="hoverable" style="display: flex; gap: 1rem; max-width:300px; margin-left: 6rem; align-items: center; justify-content: space-between;">

    <form id="{{ $pilot->id }}" method="get" action="{{ route('pilots', ['pilot_id' => $pilot->id]) }}">
        <div onclick="document.getElementById('{{ $pilot->id }}').submit();">{{ $pilot->name }}</div>
    </form>

</div>

@endforeach

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
</style>