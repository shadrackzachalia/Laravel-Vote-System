<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Models\Voters;
use App\Http\Controllers\VotersController;
use App\Http\Controllers\CandidatesController;
use App\Http\Middleware\User;
use App\Http\Controllers\UserVoteController;
use App\Http\Controllers\Auth\PasswordResetLinkController;


Route::group(['middleware' => 'prevent-back-history'],function(){
    
  

Route::get('/', function () {
    return view('user/login');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    Route::match(['post','get'],'login','AdminController@login');
    

    Route::group(['middleware'=>['admin']], function(){
        Route::get('dashboard','AdminController@dashboard');

        Route::get('logout','AdminController@logout');
    });

    
});

Route::get('voter', 'App\Http\Controllers\VotersController@manage')->middleware('admin');
Route::post('/voteradd', 'App\Http\Controllers\VotersController@store');
Route::put('/voterupdate/{id}', 'App\Http\Controllers\VotersController@update');
Route::delete('/deletevoter/{id}', 'App\Http\Controllers\VotersController@destroy');


Route::get('candidate', 'App\Http\Controllers\CandidatesController@index')->middleware('admin');
Route::post('/candidateadd', 'App\Http\Controllers\CandidatesController@store')->middleware('admin');
Route::put('/candidateupdate/{id}', 'App\Http\Controllers\CandidatesController@update')->middleware('admin');
Route::delete('/candidatedelete/{id}', 'App\Http\Controllers\CandidatesController@destroy')->middleware('admin');

Route::get('ballot','App\Http\Controllers\BallotController@view')->middleware('admin');
Route::get('votes','App\Http\Controllers\VotesController@view')->middleware('admin');


Route::match(['post','get'],'/user/login','App\Http\Controllers\UserController@login')->name('user.login');



Route::group(['middleware'=>['user']], function(){
    

    Route::get('user/dashboard','App\Http\Controllers\UserController@dashboard');
    Route::get('/user/logout','App\Http\Controllers\UserController@logout');
    Route::post('uservote/1','App\Http\Controllers\UserVoteController@store1');
    Route::post('uservote/2','App\Http\Controllers\UserVoteController@store2');
    Route::post('uservote/3','App\Http\Controllers\UserVoteController@store3');
    Route::post('uservote/4','App\Http\Controllers\UserVoteController@store4');

    Route::post('vote','App\Http\Controllers\UserVoteController@vote');

    Route::get('/already-voted', function () {
        return view('user.already_voted');
    })->name('already_voted');
});


Route::get('forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');


Route::get('forgetPassword/{token}',[\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'resetPassword'])->name('resetPassword');


Route::post('resetPasswordPost',[\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'resetPasswordPost'])->name('resetPasswordPost');

});