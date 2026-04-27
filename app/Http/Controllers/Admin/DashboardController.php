<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Vote;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_candidates' => Candidate::count(),
            'total_categories' => Category::count(),
            'total_votes'      => Vote::count(),
            'total_users'      => User::count(),
            'active_candidates'=> Candidate::where('is_active', true)->count(),
        ];

        $topCandidates = Candidate::with('category')
            ->orderByDesc('votes')
            ->limit(5)
            ->get();

        $votesByCategory = Category::withCount('candidates')
            ->with(['candidates' => fn($q) => $q->select('id','category_id','votes')])
            ->get()
            ->map(function ($cat) {
                $cat->total_votes = $cat->candidates->sum('votes');
                return $cat;
            });

        $recentVotes = Vote::with('candidate')
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'topCandidates', 'votesByCategory', 'recentVotes'));
    }
}
