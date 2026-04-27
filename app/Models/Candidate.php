<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'origin',
        'category_id',
        'description',
        'photo',
        'youtube_url',
        'emoji',
        'bg_color',
        'votes',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'votes'     => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Persentase suara relatif terhadap total suara seluruh kandidat.
     */
    public function getVotePercentageAttribute(): float
    {
        $total = static::sum('votes');
        if ($total === 0) return 0;
        return round(($this->votes / $total) * 100, 1);
    }

    /**
     * Persentase suara relatif terhadap kandidat dengan suara terbanyak.
     */
    public function getVoteBarPercentageAttribute(): float
    {
        $max = static::max('votes');
        if ($max === 0) return 0;
        return round(($this->votes / $max) * 100, 1);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeTopVoted($query, int $limit = 10)
    {
        return $query->active()->orderByDesc('votes')->limit($limit);
    }
}
