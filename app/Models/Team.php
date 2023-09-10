<?php

namespace App\Models;
use App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    protected $fillable = ['team_name', 'kill', 'point', 'event_id', 'id'];
    public function team(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
