<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Category;
use App\Models\Vote;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'total_votes'      => Vote::count(),
            'total_candidates' => Candidate::active()->count(),
            'total_categories' => Category::count(),
            'days_remaining'   => 12,
        ];

        $topCandidates = Candidate::with('category')
            ->active()
            ->orderByDesc('votes')
            ->limit(4)
            ->get();

        $categories = Category::withCount('candidates')->get();

        return view('home.index', compact('stats', 'topCandidates', 'categories'));
    }
}
