<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidates;
use App\Models\Voters;
use App\Models\Votes;
use Illuminate\Auth\SessionGuard;

class UserController extends Controller
{
    public function dashboard(){

        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
        $candidate = Candidates::all();
        $candidates = Candidates::all();

        // Fetch votes by the logged-in user
        $votes = Votes::where('voters_id', $user_id)->get()->keyBy('position');

        // Check if the user has voted for all positions
        $positions = $candidates->pluck('position')->unique();
        $hasVotedForAll = $positions->every(function($position) use ($votes) {
            return isset($votes[$position]);
        });

        if ($hasVotedForAll) {
            return view('user.already_voted');
        }
        
        //return response()->json($buttonStates);
        return view('user.dashboard',compact('candidate','user_name','user_id','candidates','votes'));
    }

    public function login(Request $request){

       
        if($request->isMethod('post')){
            $data = $request->all();

            if(Auth::guard('web')->attempt(['email'=>$data['email'], 'password'=>$data['password']])) 
            {
                return redirect("user/dashboard");
            
            }
              else {
                   return redirect()->back()->with("error_message", "Invalid Email or Password");
                }
    
        }   
        return view('user.login');
    }

    public function logout(){
        Auth::guard('web')->logout();
         
         return redirect('user/login');
    }
}
