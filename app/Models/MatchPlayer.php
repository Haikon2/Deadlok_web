<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchPlayer extends Model
{
    protected $table = 'match_players';

    protected $fillable = [
        'match_id',
        'player_id',
        'hero_id',
        'team',
        'kills',
        'deaths',
        'assists',
        'gold_earned',
        'damage_dealt',
        'damage_taken',
        'healing_done',
        'is_winner',
    ];\n\n    protected $casts = [
        'is_winner' => 'boolean',
    ];\n\n    public function match(): BelongsTo
    {
        return $this->belongsTo(GameMatch::class, 'match_id');
    }\n\n    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }\n\n    public function hero(): BelongsTo
    {
        return $this->belongsTo(Hero::class);
    }
}
