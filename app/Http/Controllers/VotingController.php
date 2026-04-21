<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Category;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    /**
     * Halaman utama voting dengan daftar kandidat.
     */
    public function index(Request $request)
    {
        $categoryId = $request->query('category');
        $sort       = $request->query('sort', 'votes'); // votes | name

        $candidatesQuery = Candidate::with('category')->active();

        if ($categoryId) {
            $candidatesQuery->where('category_id', $categoryId);
        }

        if ($sort === 'name') {
            $candidatesQuery->orderBy('name');
        } else {
            $candidatesQuery->orderByDesc('votes');
        }

        $candidates = $candidatesQuery->get();
        $categories = Category::all();

        // Suara yang sudah diberikan user ini (berdasarkan IP)
        $voterIp    = $request->ip();
        $votedIds   = Vote::where('voter_ip', $voterIp)
                          ->pluck('candidate_id')
                          ->toArray();

        $totalVotes = Vote::count();
        $maxVotes   = Candidate::active()->max('votes') ?: 1;

        return view('voting.index', compact(
            'candidates', 'categories', 'categoryId',
            'sort', 'votedIds', 'totalVotes', 'maxVotes'
        ));
    }

    /**
     * Proses vote dari form/AJAX.
     */
    public function vote(Request $request, Candidate $candidate)
    {
        $request->validate([
            'candidate_id' => 'sometimes|integer|exists:candidates,id',
        ]);

        $voterIp = $request->ip();

        // Kandidat harus aktif
        if (! $candidate->is_active) {
            return $this->voteResponse($request, false, 'Kandidat tidak aktif.');
        }

        // Cek sudah vote atau belum
        if (Vote::hasVoted($candidate->id, $voterIp)) {
            return $this->voteResponse($request, false, 'Kamu sudah memberikan suara untuk kandidat ini.');
        }

        // Simpan dalam transaksi
        DB::transaction(function () use ($candidate, $voterIp, $request) {
            Vote::create([
                'candidate_id'  => $candidate->id,
                'voter_ip'      => $voterIp,
                'voter_session' => $request->session()->getId(),
            ]);

            $candidate->increment('votes');
        });

        return $this->voteResponse(
            $request, true,
            "Suaramu untuk {$candidate->name} berhasil dicatat! 🎉",
            $candidate->fresh()
        );
    }

    /**
     * Leaderboard / papan peringkat.
     */
    public function leaderboard()
    {
        $candidates = Candidate::with('category')
            ->active()
            ->orderByDesc('votes')
            ->get()
            ->map(function ($c, $i) {
                $c->rank = $i + 1;
                return $c;
            });

        $totalVotes = Vote::count();

        return view('voting.leaderboard', compact('candidates', 'totalVotes'));
    }

    /**
     * Statistik API (JSON) untuk refresh real-time.
     */
    public function stats()
    {
        $candidates = Candidate::active()
            ->select('id', 'name', 'votes', 'emoji')
            ->orderByDesc('votes')
            ->get();

        return response()->json([
            'total_votes' => Vote::count(),
            'candidates'  => $candidates,
        ]);
    }

    // ─── Helper ──────────────────────────────────────────────

    private function voteResponse(Request $request, bool $success, string $message, ?Candidate $candidate = null)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success'   => $success,
                'message'   => $message,
                'votes'     => $candidate?->votes,
                'candidate' => $candidate,
            ], $success ? 200 : 422);
        }

        if ($success) {
            return back()->with('success', $message);
        }
        return back()->with('error', $message);
    }
}
