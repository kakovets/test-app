<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilot;
use App\Models\Team;
use App\Models\Sponsor;

class F1Controller extends Controller {
    public function index() {
        return view(
            'landing', 
            [
                'f1pilots' => Pilot::all(), 
                'f1teams' => Team::all(), 
                'f1sponsors' => Sponsor::all()
            ]
        );
    }

    public function pilot($pilot_id) {
        return view('pilot', ['pilot' => Pilot::where('id', $pilot_id)->first()]);
    }

    public function team($team_id) {
        return view('team', ['team' => Team::where('id', $team_id)->first()]);
    }

    public function sponsor($sponsor_id) {
        return view('sponsor', ['sponsor' => Sponsor::where('id', $sponsor_id)->first()]);
    }

    public function incrementWins($id) {
        $pilot = Pilot::where('id', $id)->firstOrFail();
        $pilot->increment('wins');
        return redirect()->route('pilots', ['id' => $id]);
    }

    public function decrementWins($id) {
        $pilot = Pilot::where('id', $id)->firstOrFail();
        $pilot->decrement('wins');
        return redirect()->route('pilots', ['id' => $id]);
    }


    public function header() {
        return view('blades.header');
    }

    
}
