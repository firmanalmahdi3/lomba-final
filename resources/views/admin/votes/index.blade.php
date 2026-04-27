@extends('admin.layout')

@section('title', 'Data Vote')
@section('page-title', 'Data Vote')
@section('page-subtitle', 'Semua suara yang masuk')

@section('header-actions')
    <form method="POST" action="{{ route('admin.votes.reset-all') }}"
          onsubmit="return confirm('⚠️ RESET SEMUA VOTE? Tindakan ini tidak bisa dibatalkan!')">
        @csrf
        <button type="submit"
                class="bg-accent text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-accent-dark transition-colors">
            Reset Semua Vote
        </button>
    </form>
@endsection

@section('content')

{{-- Filter --}}
<form method="GET" class="bg-white border border-ink-100 rounded-2xl p-4 mb-6 flex flex-wrap gap-3 items-end">
    <div>
        <label class="text-xs text-ink-500 font-medium block mb-1">Cari email / IP</label>
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="email atau IP..."
               class="border border-ink-200 rounded-xl px-3 py-2 text-sm text-ink placeholder-ink-200 focus:outline-none focus:border-ink w-52">
    </div>
    <div>
        <label class="text-xs text-ink-500 font-medium block mb-1">Kandidat</label>
        <select name="candidate_id" class="border border-ink-200 rounded-xl px-3 py-2 text-sm text-ink focus:outline-none focus:border-ink">
            <option value="">Semua</option>
            @foreach($candidates as $c)
                <option value="{{ $c->id }}" {{ request('candidate_id') == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-ink text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-ink-700 transition-colors">Filter</button>
    <a href="{{ route('admin.votes.index') }}" class="text-sm text-ink-500 hover:text-ink py-2">Reset</a>
</form>

{{-- Table --}}
<div class="bg-white rounded-2xl border border-ink-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-ink-50 text-left">
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">#</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Kandidat</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Email</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">IP</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Waktu</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-ink-100">
            @forelse($votes as $vote)
            <tr class="hover:bg-ink-50 transition-colors">
                <td class="px-6 py-3 font-mono text-xs text-ink-200">{{ $vote->id }}</td>
                <td class="px-6 py-3">
                    <p class="font-semibold text-ink">{{ $vote->candidate->name ?? '—' }}</p>
                    <p class="text-[10px] text-ink-500">{{ $vote->candidate->category->name ?? '' }}</p>
                </td>
                <td class="px-6 py-3 font-mono text-xs text-ink-500">{{ $vote->email ?: '—' }}</td>
                <td class="px-6 py-3 font-mono text-xs text-ink-500">{{ $vote->voter_ip }}</td>
                <td class="px-6 py-3 text-xs text-ink-500" title="{{ $vote->created_at }}">
                    {{ $vote->created_at->format('d M Y H:i') }}
                </td>
                <td class="px-6 py-3">
                    <form method="POST" action="{{ route('admin.votes.destroy', $vote) }}"
                          onsubmit="return confirm('Hapus vote ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-xs bg-red-100 hover:bg-accent hover:text-white text-accent px-3 py-1.5 rounded-lg font-medium transition-colors">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-ink-500">Belum ada data vote.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($votes->hasPages())
    <div class="px-6 py-4 border-t border-ink-100">
        {{ $votes->links() }}
    </div>
    @endif
</div>

@endsection
