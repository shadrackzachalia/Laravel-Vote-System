<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buttons;
use Illuminate\Notifications\Notifiable;

class UserVoteModel extends Model
{
    use HasFactory;

    protected $table = 'votes';

    protected $fillable = [
        'voters_id',
        'candidates_id',
        'position',
    ];


    use Notifiable;

    public function vote()
    {
        return $this->hasMany(Buttons::class);
    }
}
