<?php

namespace App\Models;

use App\Http\Controllers\UserVoteController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    use HasFactory;
    protected $table = 'voters';

    protected $fillable = [
        'name',
        'regnumber',
        'email',
        'password',
    ];
   
    public function uservote(){
        return $this->belongsTo(UserVoteController::class);
    }
}
