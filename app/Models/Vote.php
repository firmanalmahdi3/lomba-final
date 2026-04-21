<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    protected $fillable = ['candidate_id', 'voter_ip', 'voter_session'];

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }

    /**
     * Cek apakah IP sudah pernah vote untuk kandidat tertentu.
     */
    public static function hasVoted(int $candidateId, string $ip): bool
    {
        return static::where('candidate_id', $candidateId)
                     ->where('voter_ip', $ip)
                     ->exists();
    }
}
