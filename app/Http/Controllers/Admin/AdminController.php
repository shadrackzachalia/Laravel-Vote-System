<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Candidates;
use App\Models\UserVoteModel;
use App\Models\Voters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){

        $total_voters = Voters::count();
        $total_candidate = Candidates::count();
        $total_votes = UserVoteModel::count();
        return view('admin.dashboard', compact('total_voters','total_candidate','total_votes'));
    }

    public function login(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])) 
            {
                return redirect("admin/dashboard");
            
            }
              else {
                   return redirect()->back()->with("error", "Invalid Email or Password");
                }
        }
        return view('admin.login');
        
    }
     public function logout(){
        Auth::guard('admin')->logout();
         
         return redirect('admin/login');
     }

     
     public function view(){
         return view('admin.view');
     }
}
