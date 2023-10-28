<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TotalRound extends Model
{
    protected $fillable = ['id', 'event_id', 'team_id', 'team_name', 'kill', 'point'];
    public function round(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
