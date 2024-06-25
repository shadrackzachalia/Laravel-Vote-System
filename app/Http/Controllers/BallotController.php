<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use Illuminate\Http\Request;

class BallotController extends Controller
{
    public function view(){
        $candidates = Candidates::all();
        $candidate = Candidates::all();

        return view('ballot.view', compact('candidates','candidate'));
    }
}
