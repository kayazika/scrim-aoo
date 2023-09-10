<?php

namespace App\Models;
use App\Models\Team;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'max_kill', 'user_id', 'description', 'id', 'random_id'];

    public function team(){
        return $this->hasMany(Team::class, Round::class);
    }
}
