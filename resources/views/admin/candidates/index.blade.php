@extends('admin.layout')

@section('title', 'Kandidat')
@section('page-title', 'Kandidat')
@section('page-subtitle', 'Kelola semua kandidat lomba')

@section('header-actions')
    <a href="{{ route('admin.candidates.create') }}"
       class="bg-ink text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-ink-700 transition-colors flex items-center gap-2">
        <span>+</span> Tambah Kandidat
    </a>
@endsection

@section('content')

{{-- Filter --}}
<form method="GET" class="bg-white border border-ink-100 rounded-2xl p-4 mb-6 flex flex-wrap gap-3 items-end">
    <div>
        <label class="text-xs text-ink-500 font-medium block mb-1">Cari</label>
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Nama kandidat..."
               class="border border-ink-200 rounded-xl px-3 py-2 text-sm text-ink placeholder-ink-200 focus:outline-none focus:border-ink w-52">
    </div>
    <div>
        <label class="text-xs text-ink-500 font-medium block mb-1">Kategori</label>
        <select name="category_id" class="border border-ink-200 rounded-xl px-3 py-2 text-sm text-ink focus:outline-none focus:border-ink">
            <option value="">Semua</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="text-xs text-ink-500 font-medium block mb-1">Status</label>
        <select name="status" class="border border-ink-200 rounded-xl px-3 py-2 text-sm text-ink focus:outline-none focus:border-ink">
            <option value="">Semua</option>
            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Nonaktif</option>
        </select>
    </div>
    <button type="submit" class="bg-ink text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-ink-700 transition-colors">Filter</button>
    <a href="{{ route('admin.candidates.index') }}" class="text-sm text-ink-500 hover:text-ink py-2">Reset</a>
</form>

{{-- Table --}}
<div class="bg-white rounded-2xl border border-ink-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-ink-50 text-left">
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Kandidat</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Kategori</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Suara</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Status</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-ink-100">
            @forelse($candidates as $candidate)
            <tr class="hover:bg-ink-50 transition-colors">
                <td class="px-6 py-3">
                    <div class="flex items-center gap-3">
                        <span class="text-xl">{{ $candidate->emoji }}</span>
                        <div>
                            <p class="font-semibold text-ink">{{ $candidate->name }}</p>
                            @if($candidate->youtube_url)
                                <a href="{{ $candidate->youtube_url }}" target="_blank" class="text-[10px] text-accent hover:underline">▶ YouTube</a>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="px-6 py-3 text-ink-500 text-xs">{{ $candidate->category->name ?? '-' }}</td>
                <td class="px-6 py-3">
                    <span class="font-mono font-bold text-ink">{{ number_format($candidate->votes) }}</span>
                </td>
                <td class="px-6 py-3">
                    @if($candidate->is_active)
                        <span class="bg-green-100 text-green-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Aktif</span>
                    @else
                        <span class="bg-ink-100 text-ink-500 text-[10px] font-semibold px-2 py-0.5 rounded-full">Nonaktif</span>
                    @endif
                </td>
                <td class="px-6 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.candidates.edit', $candidate) }}"
                           class="text-xs bg-ink-100 hover:bg-ink hover:text-white text-ink px-3 py-1.5 rounded-lg font-medium transition-colors">Edit</a>

                        <form method="POST" action="{{ route('admin.candidates.toggle-status', $candidate) }}">
                            @csrf
                            <button type="submit" class="text-xs bg-ink-100 hover:bg-gold hover:text-ink text-ink-500 px-3 py-1.5 rounded-lg font-medium transition-colors">
                                {{ $candidate->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.candidates.reset-votes', $candidate) }}"
                              onsubmit="return confirm('Reset suara {{ $candidate->name }}?')">
                            @csrf
                            <button type="submit" class="text-xs bg-orange-100 hover:bg-orange-500 hover:text-white text-orange-600 px-3 py-1.5 rounded-lg font-medium transition-colors">Reset</button>
                        </form>

                        <form method="POST" action="{{ route('admin.candidates.destroy', $candidate) }}"
                              onsubmit="return confirm('Hapus kandidat ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs bg-red-100 hover:bg-accent hover:text-white text-accent px-3 py-1.5 rounded-lg font-medium transition-colors">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-ink-500">Tidak ada kandidat ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    @if($candidates->hasPages())
    <div class="px-6 py-4 border-t border-ink-100">
        {{ $candidates->links() }}
    </div>
    @endif
</div>

@endsection
