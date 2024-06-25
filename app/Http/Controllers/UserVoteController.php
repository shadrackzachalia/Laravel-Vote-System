<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Models\Candidates;
use App\Models\User;
use App\Models\Voters;
use App\Models\UserVoteModel;
use App\Models\Votes;

class UserVoteController extends Controller
{
    public function store1(){

        
        $user_id = intval(Auth::user()->id);
        
        $candidate = Candidates::all();
        
             
        UserVoteModel::create([
            'voters_id'=>$user_id,
            'candidates_id'=>$candidate[0]->id,
            'position'=>$candidate[0]->position,
        ]);

        return redirect()->back();

    }

    public function store2(){

        
        $user_id = intval(Auth::user()->id);
        
        $candidate = Candidates::all();
             
        UserVoteModel::create([
            'voters_id'=>$user_id,
            'candidates_id'=>$candidate[1]->id,
            'position'=>$candidate[1]->position,
        ]);

        return redirect()->back();

    }

    public function store3(){

        
        $user_id = intval(Auth::user()->id);
        
        $candidate = Candidates::all();
             
        UserVoteModel::create([
            'voters_id'=>$user_id,
            'candidates_id'=>$candidate[2]->id,
            'position'=>$candidate[2]->position,
        ]);

        return redirect()->back();

    }

    public function store4(){

        
        $user_id = intval(Auth::user()->id);
        
        $candidate = Candidates::all();
             
        UserVoteModel::create([
            'voters_id'=>$user_id,
            'candidates_id'=>$candidate[3]->id,
            'position'=>$candidate[3]->position,
        ]);

        return redirect()->back();

    }

    public function vote(Request $request)
    {
        // Validate the request
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
            'position' => 'required'
        ]);

        $user_id = Auth::user()->id;
    
        // Check if the user has already voted for this position
        $existingVote = Votes::where('voters_id', $user_id)
                        ->where('position', $request->position)
                        ->first();

        if ($existingVote) {
           return redirect()->back()->with('error', 'You have already voted for this position.');
    }

        // Create a new vote or handle the vote logic
        $vote = new UserVoteModel();
        $vote->voters_id = auth()->id();
        $vote->candidates_id = $request->input('candidate_id');
        $vote->position = $request->input('position');
        $vote->save();

        // Check if the user has voted for all positions
        $candidates = Candidates::all();
        $votes = Votes::where('voters_id', $user_id)->get()->keyBy('position');
        $positions = $candidates->pluck('position')->unique();
        $hasVotedForAll = $positions->every(function($position) use ($votes) {
            return isset($votes[$position]);
        });

        if ($hasVotedForAll) {
            return redirect()->route('already_voted');
        }

        return redirect()->back()->with('success', 'Your vote has been recorded.');
    }
}
