<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\F1Controller;

Route::get('/header', [F1Controller::class, 'header'])->name('header');

Route::get('/', [F1Controller::class, 'index'])->name('index');


Route::get('/pilots/{pilot_id}', [F1Controller::class, 'pilot'])->name('pilots');
Route::get('/teams/{team_id}', [F1Controller::class, 'team'])->name('teams');
Route::get('/sponsors/s/{sponsor_id}', [F1Controller::class, 'sponsor'])->name('sponsors');

Route::post('/pilots/{id}/inc-wins', [F1Controller::class, 'incrementWins'])->name('inc_wins');
Route::post('/pilots/{id}/dec-wins', [F1Controller::class, 'decrementWins'])->name('dec_wins');
