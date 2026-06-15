<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'avatar_url',
        'level',
        'rank_points',
        'total_kills',
        'total_deaths',
        'total_matches',
        'total_wins',
        'win_rate',
        'last_match_at',
    ];

    protected $casts = [
        'last_match_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function matchPlayers(): HasMany
    {
        return $this->hasMany(MatchPlayer::class);
    }
}
