<?php

namespace App\Http\Controllers;

use App\Models\Voters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VotersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $voter = new Voters();
        $voter = Voters::all();
        return view('voter.manage')->with('voter',$voter);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $voter = new Voters();

        $voter->name = $request->input('name');
        $voter->regnumber = $request->input('regnumber');
        $voter->email = $request->input('email');
        $voter->password = Hash::make ($request->input('password'));

        $voter->save();
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         
        $voter = Voters::find($id);

        $voter->name = $request->input('name');
        $voter->regnumber = $request->input('regnumber');
        $voter->email = $request->input('email');
        $voter->password = Hash::make($request->input('password'));

        $voter->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voter = Voters::find($id);

        $voter->delete();
    }

    
}
