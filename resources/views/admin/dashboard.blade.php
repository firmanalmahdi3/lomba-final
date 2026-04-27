@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan data Festival Film Pendek Blitar')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="stat-card">
        <p class="text-xs text-ink-500 font-medium uppercase tracking-wide mb-1">Total Vote</p>
        <p class="text-3xl font-bold text-ink font-mono">{{ number_format($stats['total_votes']) }}</p>
        <p class="text-xs text-ink-500 mt-1">suara masuk</p>
    </div>
    <div class="stat-card">
        <p class="text-xs text-ink-500 font-medium uppercase tracking-wide mb-1">Kandidat</p>
        <p class="text-3xl font-bold text-ink font-mono">{{ $stats['total_candidates'] }}</p>
        <p class="text-xs text-green-600 mt-1">{{ $stats['active_candidates'] }} aktif</p>
    </div>
    <div class="stat-card">
        <p class="text-xs text-ink-500 font-medium uppercase tracking-wide mb-1">Kategori</p>
        <p class="text-3xl font-bold text-ink font-mono">{{ $stats['total_categories'] }}</p>
        <p class="text-xs text-ink-500 mt-1">kelompok lomba</p>
    </div>
    <div class="stat-card">
        <p class="text-xs text-ink-500 font-medium uppercase tracking-wide mb-1">Pengguna</p>
        <p class="text-3xl font-bold text-ink font-mono">{{ number_format($stats['total_users']) }}</p>
        <p class="text-xs text-ink-500 mt-1">terdaftar</p>
    </div>
</div>

<div class="grid grid-cols-3 gap-6">

    {{-- Top Candidates --}}
    <div class="col-span-2 bg-white rounded-2xl border border-ink-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-ink-100 flex items-center justify-between">
            <h2 class="font-bold text-ink">🏆 Top Kandidat</h2>
            <a href="{{ route('admin.candidates.index') }}" class="text-xs text-accent hover:underline">Lihat semua →</a>
        </div>
        <div class="divide-y divide-ink-100">
            @forelse($topCandidates as $i => $candidate)
            <div class="px-6 py-3 flex items-center gap-4">
                <span class="w-6 text-center font-mono text-sm font-bold {{ $i === 0 ? 'text-gold' : 'text-ink-200' }}">
                    {{ $i + 1 }}
                </span>
                <span class="text-xl">{{ $candidate->emoji }}</span>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm text-ink truncate">{{ $candidate->name }}</p>
                    <p class="text-xs text-ink-500">{{ $candidate->category->name ?? '-' }}</p>
                </div>
                <div class="text-right">
                    <p class="font-mono font-bold text-sm text-ink">{{ number_format($candidate->votes) }}</p>
                    <p class="text-[10px] text-ink-500">suara</p>
                </div>
            </div>
            @empty
            <p class="px-6 py-8 text-center text-sm text-ink-500">Belum ada kandidat.</p>
            @endforelse
        </div>
    </div>

    {{-- Votes by category --}}
    <div class="bg-white rounded-2xl border border-ink-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-ink-100">
            <h2 class="font-bold text-ink">📊 Vote per Kategori</h2>
        </div>
        <div class="p-6 space-y-4">
            @php $maxVote = $votesByCategory->max('total_votes') ?: 1; @endphp
            @foreach($votesByCategory as $cat)
            <div>
                <div class="flex justify-between items-center mb-1">
                    <span class="text-xs font-medium text-ink">{{ $cat->icon }} {{ $cat->name }}</span>
                    <span class="font-mono text-xs text-ink-500">{{ number_format($cat->total_votes) }}</span>
                </div>
                <div class="h-1.5 bg-ink-100 rounded-full overflow-hidden">
                    <div class="h-full bg-ink rounded-full transition-all duration-700"
                         style="width: {{ $maxVote > 0 ? round($cat->total_votes / $maxVote * 100) : 0 }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

{{-- Recent Votes --}}
<div class="mt-6 bg-white rounded-2xl border border-ink-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-ink-100 flex items-center justify-between">
        <h2 class="font-bold text-ink">🕐 Vote Terbaru</h2>
        <a href="{{ route('admin.votes.index') }}" class="text-xs text-accent hover:underline">Lihat semua →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-ink-50 text-left">
                    <th class="px-6 py-2 text-xs font-semibold text-ink-500">Kandidat</th>
                    <th class="px-6 py-2 text-xs font-semibold text-ink-500">Email / IP</th>
                    <th class="px-6 py-2 text-xs font-semibold text-ink-500">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink-100">
                @forelse($recentVotes as $vote)
                <tr class="hover:bg-ink-50 transition-colors">
                    <td class="px-6 py-2.5 font-medium text-ink">{{ $vote->candidate->name ?? '-' }}</td>
                    <td class="px-6 py-2.5 font-mono text-xs text-ink-500">{{ $vote->email ?: $vote->voter_ip }}</td>
                    <td class="px-6 py-2.5 text-xs text-ink-500">{{ $vote->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr><td colspan="3" class="px-6 py-8 text-center text-ink-500">Belum ada vote.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
