<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buttons extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['voters_id', 'candidates_id', 'position'];

    public function user()
    {
        return $this->belongsTo(UserVoteModel::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidates::class);
    }
}
