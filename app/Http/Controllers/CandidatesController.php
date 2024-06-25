<?php

namespace App\Http\Controllers;
use App\Models\Candidates;

use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    public function index(){
        
        $candidates = Candidates::all();
        return view('candidate.index', compact('candidates'));
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'course'=>'required',
            'position'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,webp',
        ]);

        

        $candidate = new Candidates();

        $candidate->name = $request->input('name');
        $candidate->course = $request->input('course');
        $candidate->position = $request->input('position');
        
        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/images/';
            $file->move($path, $filename);
            $candidate->image = $path.$filename;
        } 

        $candidate->save();
    }

    public function update(Request $request, $id){
        $candidate = Candidates::find($id);

        $candidate->name = $request->input('name');
        $candidate->course = $request->input('course');
        $candidate->position = $request->input('position');
        
        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/images/';
            $file->move($path, $filename);
            $candidate->image = $path.$filename;
        }

         $candidate->save();
    }

    public function destroy($id){
        $candidate = Candidates::find($id);

        $candidate->delete();
    }
}
