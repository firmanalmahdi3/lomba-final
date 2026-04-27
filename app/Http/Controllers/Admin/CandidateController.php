<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $query = Candidate::with('category');

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        $candidates = $query->orderByDesc('votes')->paginate(15)->withQueryString();
        $categories = Category::all();

        return view('admin.candidates.index', compact('candidates', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.candidates.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'youtube_url' => 'nullable|url',
            'emoji'       => 'nullable|string|max:10',
            'photo'       => 'nullable|image|max:2048',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('candidates', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');
        $data['votes'] = 0;

        Candidate::create($data);

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Kandidat berhasil ditambahkan.');
    }

    public function edit(Candidate $candidate)
    {
        $categories = Category::all();
        return view('admin.candidates.edit', compact('candidate', 'categories'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'youtube_url' => 'nullable|url',
            'emoji'       => 'nullable|string|max:10',
            'photo'       => 'nullable|image|max:2048',
            'is_active'   => 'boolean',
            'votes'       => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('photo')) {
            if ($candidate->photo) {
                Storage::disk('public')->delete($candidate->photo);
            }
            $data['photo'] = $request->file('photo')->store('candidates', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $candidate->update($data);

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Kandidat berhasil diperbarui.');
    }

    public function destroy(Candidate $candidate)
    {
        if ($candidate->photo) {
            Storage::disk('public')->delete($candidate->photo);
        }
        $candidate->delete();

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Kandidat berhasil dihapus.');
    }

    public function resetVotes(Candidate $candidate)
    {
        $candidate->update(['votes' => 0]);
        $candidate->votes()->delete();

        return redirect()->back()->with('success', "Suara {$candidate->name} berhasil direset.");
    }

    public function toggleStatus(Candidate $candidate)
    {
        $candidate->update(['is_active' => !$candidate->is_active]);
        $status = $candidate->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->back()->with('success', "Kandidat berhasil {$status}.");
    }
}
