<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hero extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'role',
        'health',
        'speed',
        'attack_power',
        'image_path',
        'is_active',
    ];

    public function matchPlayers(): HasMany
    {
        return $this->hasMany(MatchPlayer::class);
    }
}
