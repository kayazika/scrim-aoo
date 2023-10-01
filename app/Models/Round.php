<?php

namespace App\Models;
use App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Round extends Model
{
    protected $fillable = ['id', 'event_id', 'team_id', 'team_name', 'kill', 'point', 'match_point_winner'];
    public function round(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

}
