@extends('layouts.app')

@section('title', 'Voting — Festival Film Pendek Blitar')

@section('content')

{{-- HERO --}}
<section class="py-16 text-center relative overflow-hidden"
         style="background: #00bdd7;">
    <div class="absolute inset-0 opacity-5"
         style="background-image: url(\"data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='1'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10v20c5.5 0 10-4.5 10-10z'/%3E%3C/g%3E%3C/svg%3E\")">
    </div>
    <div class="relative max-w-3xl mx-auto px-6">
        <h1 class="font-display text-white text-5xl font-black mb-3">Halaman Voting</h1>
        <p class="text-white text-lg mb-4">Pilih peserta favoritmu dan berikan dukunganmu!</p>
    </div>
</section>

{{-- STATS MINI --}}
<div class="bg-white border-b border-orange-100">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between flex-wrap gap-3">
        <p class="text-sm text-gray-500">
            Menampilkan <span class="font-bold text-gray-900">{{ $candidates->count() }}</span> peserta
            @if($categoryId)
                di kategori terpilih
            @endif
        </p>
    </div>
</div>

{{-- FILTER --}}
<div class="max-w-6xl mx-auto px-6 pt-8">
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">

        {{-- Filter Kategori --}}
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('voting.index') }}"
               class="px-5 py-2 rounded-full text-sm font-semibold border-2 transition-all duration-200
                      {{ !$categoryId ? 'bg-[#ed8036] text-white border-[#ed8036]' : 'bg-white text-gray-500 border-gray-200 hover:border-[#ed8036] hover:[#ed8036]' }}">
                Semua
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('voting.index', ['category' => $cat->id, 'sort' => $sort]) }}"
               class="px-5 py-2 rounded-full text-sm font-semibold border-2 transition-all duration-200
                      {{ $categoryId == $cat->id ? 'bg-[#ed8036] text-white border-[#ed8036]' : 'bg-white text-gray-500 border-gray-200 hover:border-[#ed8036] hover:text-[#ed8036]' }}">
                {{ $cat->icon }} {{ $cat->name }}
            </a>
            @endforeach
        </div>

{{-- GRID KANDIDAT CONTOH --}}
{{-- Thumbnail YouTube --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>

    <div class="text-center">
        <h2 class="text-lg font-bold mb-4">Video 1</h2>

        <a href="https://youtu.be/1q9Fg2XPY0M" target="_blank" class="group relative block">

            <img src="https://img.youtube.com/vi/1q9Fg2XPY0M/maxresdefault.jpg"
                class="w-full h-40 object-cover rounded-lg shadow-lg transition">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center 
                        rounded-lg opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-semibold text-sm">
                    ▶ Tonton Video Ini
                </span>
            </div>
        </a>

        <button class="mt-4 w-full py-2 border-2 border-[#ed8036] text-[#ed8036] rounded-xl hover:bg-[#ed8036] hover:text-white">
            🗳️ Vote
        </button>
    </div>
    
</div>

    @if($candidates->isEmpty())
        <div class="text-center py-20 text-gray-400">
            <div class="text-6xl mb-4">😔</div>
            <p class="font-semibold text-lg">Belum ada peserta di kategori ini.</p>
        </div>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 pb-16">
        @foreach($candidates as $i => $candidate)
        @php
            $isVoted    = in_array($candidate->id, $votedIds);
            $barPct     = $maxVotes > 0 ? round(($candidate->votes / $maxVotes) * 100) : 0;
            $rankColors = ['bg-amber-400', 'bg-gray-400', 'bg-amber-700'];
            $rankClass  = $rankColors[$i] ?? 'bg-blue-600';
        @endphp
        <div class="bg-white border border-orange-100 rounded-2xl overflow-hidden
                    hover:-translate-y-1 hover:shadow-2xl transition-all duration-200 animate-fade-in"
             style="animation-delay: {{ $i * 40 }}ms">

            {{-- Thumbnail --}}
            <div class="h-44 flex items-center justify-center text-6xl relative"
                 style="background: {{ $candidate->bg_color }}">

                @if($candidate->photo)
                    <img src="{{ asset('storage/' . $candidate->photo) }}"
                         alt="{{ $candidate->name }}"
                         class="w-full h-full object-cover">
                @else
                    <span>{{ $candidate->emoji }}</span>
                @endif

                {{-- Gradient overlay --}}
                <div class="absolute inset-0"
                     style="background: linear-gradient(to top, rgba(0,0,0,0.45) 0%, transparent 55%)">
                </div>

                {{-- Rank badge --}}
                <span class="absolute top-3 left-3 w-8 h-8 {{ $rankClass }} rounded-full
                             flex items-center justify-center text-white text-xs font-bold shadow">
                    {{ $i + 1 }}
                </span>

                {{-- Category badge --}}
                <span class="absolute top-3 right-3 bg-white/90 text-orange-700 text-xs font-bold px-3 py-1 rounded-full">
                    {{ $candidate->category->name }}
                </span>
            </div>

            {{-- Body --}}
            <div class="p-5">
                <h3 class="font-bold text-gray-900 text-base mb-1">{{ $candidate->name }}</h3>
                <p class="text-xs text-gray-400 mb-4">📍 {{ $candidate->origin }}</p>

                {{-- Vote bar --}}
                <div class="mb-4">
                    <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                        <span>{{ number_format($candidate->votes) }} suara</span>
                        <span>{{ $barPct }}%</span>
                    </div>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full rounded-full vote-bar-fill"
                             style="width: {{ $barPct }}%;
                                    background: linear-gradient(90deg, #F97316, #C2410C)">
                        </div>
                    </div>
                </div>

                {{-- Vote button --}}
                @if($isVoted)
                    <button disabled
                            class="w-full py-2.5 rounded-xl text-sm font-bold border-2 border-blue-600
                                   bg-blue-600 text-white cursor-default">
                        ✓ Sudah Voted
                    </button>
                @else
                    <button onclick="openVoteModal({{ $candidate->id }}, '{{ addslashes($candidate->name) }}', '{{ addslashes($candidate->origin) }}')"
                            class="w-full py-2.5 rounded-xl text-sm font-bold border-2 border-orange-500
                                   text-orange-500 hover:bg-orange-500 hover:text-white
                                   transition-all duration-200 hover:scale-[1.02]">
                        🗳️ Vote Sekarang
                    </button>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

{{-- MODAL KONFIRMASI --}}
<div id="vote-modal"
     class="fixed inset-0 z-50 bg-black/60 flex items-center justify-center p-4"
     style="display: none !important">
    <div class="bg-white rounded-2xl p-8 max-w-sm w-full text-center shadow-2xl"
         style="animation: popIn 0.3s ease">
        <div class="text-5xl mb-4">🗳️</div>
        <h2 class="font-display text-2xl font-black text-gray-900 mb-2" id="modal-candidate-name">
            Konfirmasi Vote
        </h2>
        <p class="text-gray-500 text-sm mb-6 leading-relaxed" id="modal-candidate-desc">
            Apakah kamu yakin ingin memberikan suara?
        </p>
        <div class="flex gap-3">
            <button onclick="closeVoteModal()"
                    class="flex-1 py-3 rounded-xl font-semibold text-sm border border-gray-200 hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <form id="vote-form" method="POST" class="flex-1">
                @csrf
                <button type="submit"
                        class="w-full py-3 rounded-xl font-bold text-sm bg-orange-500 hover:bg-orange-700 text-white transition-colors">
                    Ya, Vote Sekarang!
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
@keyframes popIn {
    from { transform: scale(0.85); opacity: 0; }
    to   { transform: scale(1);    opacity: 1; }
}
</style>
@endpush

@push('scripts')
<script>
const modal = document.getElementById('vote-modal');

function openVoteModal(id, name, origin) {
    document.getElementById('modal-candidate-name').textContent = 'Vote untuk ' + name;
    document.getElementById('modal-candidate-desc').textContent =
        'Apakah kamu yakin ingin memberikan suaramu untuk ' + name + ' dari ' + origin + '?';
    document.getElementById('vote-form').action = '/voting/' + id;
    modal.style.removeProperty('display');
    modal.style.display = 'flex';
}

function closeVoteModal() {
    modal.style.display = 'none';
}

// Tutup modal saat klik overlay
modal.addEventListener('click', function(e) {
    if (e.target === modal) closeVoteModal();
});

// Tutup modal dengan Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeVoteModal();
});
</script>
@endpush
