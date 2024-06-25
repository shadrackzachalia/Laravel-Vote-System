<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use App\Models\UserVoteModel;
use App\Models\Votes;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function view(){

        $eachtotal_votes = UserVoteModel::where('candidates_id','20')->count();
        $eachtotal_votes1 = UserVoteModel::where('candidates_id','21')->count();
        $eachtotal_votes2 = UserVoteModel::where('candidates_id','22')->count();
        $eachtotal_votes3 = UserVoteModel::where('candidates_id','23')->count();

        $candidate = Candidates::all();
        return view('votes.view', compact('candidate','eachtotal_votes','eachtotal_votes1','eachtotal_votes2','eachtotal_votes3'));
    }
}
