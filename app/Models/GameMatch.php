<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameMatch extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'map',
        'status',
        'mode',
        'team_a_score',
        'team_b_score',
        'started_at',
        'ended_at',
        'duration_seconds',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function matchPlayers(): HasMany
    {
        return $this->hasMany(MatchPlayer::class, 'match_id');
    }
}
