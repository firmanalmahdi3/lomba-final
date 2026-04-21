<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'description'];

    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class);
    }

    public function activeCandidates(): HasMany
    {
        return $this->hasMany(Candidate::class)->where('is_active', true);
    }

    public function getTotalVotesAttribute(): int
    {
        return $this->candidates()->sum('votes');
    }
}
