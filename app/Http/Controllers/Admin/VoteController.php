<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Vote::with(['candidate.category']);

        if ($request->candidate_id) {
            $query->where('candidate_id', $request->candidate_id);
        }
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('email', 'like', '%'.$request->search.'%')
                  ->orWhere('voter_ip', 'like', '%'.$request->search.'%');
            });
        }

        $votes = $query->latest()->paginate(20)->withQueryString();
        $candidates = Candidate::orderBy('name')->get();

        return view('admin.votes.index', compact('votes', 'candidates'));
    }

    public function destroy(Vote $vote)
    {
        // Decrement candidate votes counter
        $vote->candidate?->decrement('votes');
        $vote->delete();

        return redirect()->back()->with('success', 'Vote berhasil dihapus.');
    }

    public function resetAll()
    {
        Vote::truncate();
        Candidate::query()->update(['votes' => 0]);

        return redirect()->route('admin.votes.index')
            ->with('success', 'Semua data vote berhasil direset.');
    }
}
