<?php

namespace App\Models;

use App\Http\Controllers\UserVoteController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    use HasFactory;
    protected $table = 'candidates';
    protected $fillable = [
        'name',
        'course',
        'position',
        'image',
    ];

    public function uservote(){
        return $this->belongsTo(UserVoteController::class);
    }
}
