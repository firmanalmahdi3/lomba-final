@extends('layouts.app')

@section('title', 'Leaderboard — Festival Lampung')

@section('content')

{{-- HERO --}}
<section class="py-16 text-center"
         style="background: linear-gradient(135deg, #1E3A8A 0%, #1D4ED8 60%, #F97316 100%)">
    <div class="max-w-3xl mx-auto px-6">
        <h1 class="font-display text-white text-5xl font-black mb-3">🏆 Leaderboard</h1>
        <p class="text-white/80 text-lg">Papan peringkat peserta berdasarkan jumlah suara</p>
        <p class="text-white/60 text-sm mt-2">Total suara masuk: <strong class="text-orange-300">{{ number_format($totalVotes) }}</strong></p>
    </div>
</section>

<div class="max-w-4xl mx-auto px-6 py-12">

    {{-- TOP 3 PODIUM --}}
    @if($candidates->count() >= 3)
    <div class="grid grid-cols-3 gap-4 mb-12 items-end">
        {{-- 2nd Place --}}
        @php $second = $candidates->get(1) @endphp
        <div class="text-center">
            <div class="w-20 h-20 mx-auto rounded-2xl flex items-center justify-center text-4xl mb-3 border-4 border-gray-300"
                 style="background: {{ $second->bg_color }}">
                {{ $second->emoji }}
            </div>
            <div class="bg-gray-100 rounded-t-2xl pt-6 pb-4 px-4">
                <span class="text-4xl">🥈</span>
                <p class="font-bold text-gray-900 text-sm mt-2 leading-tight">{{ $second->name }}</p>
                <p class="text-xs text-gray-400">{{ $second->origin }}</p>
                <p class="font-display font-black text-gray-600 text-xl mt-2">{{ number_format($second->votes) }}</p>
                <p class="text-xs text-gray-400">suara</p>
            </div>
        </div>

        {{-- 1st Place --}}
        @php $first = $candidates->get(0) @endphp
        <div class="text-center">
            <div class="w-24 h-24 mx-auto rounded-2xl flex items-center justify-center text-5xl mb-3 border-4 border-amber-400 shadow-lg"
                 style="background: {{ $first->bg_color }}">
                {{ $first->emoji }}
            </div>
            <div class="bg-amber-50 border border-amber-200 rounded-t-2xl pt-6 pb-4 px-4">
                <span class="text-5xl">🥇</span>
                <p class="font-bold text-gray-900 text-sm mt-2 leading-tight">{{ $first->name }}</p>
                <p class="text-xs text-gray-400">{{ $first->origin }}</p>
                <p class="font-display font-black text-amber-500 text-2xl mt-2">{{ number_format($first->votes) }}</p>
                <p class="text-xs text-gray-400">suara</p>
            </div>
        </div>

        {{-- 3rd Place --}}
        @php $third = $candidates->get(2) @endphp
        <div class="text-center">
            <div class="w-20 h-20 mx-auto rounded-2xl flex items-center justify-center text-4xl mb-3 border-4 border-amber-700"
                 style="background: {{ $third->bg_color }}">
                {{ $third->emoji }}
            </div>
            <div class="bg-orange-50 rounded-t-2xl pt-6 pb-4 px-4">
                <span class="text-4xl">🥉</span>
                <p class="font-bold text-gray-900 text-sm mt-2 leading-tight">{{ $third->name }}</p>
                <p class="text-xs text-gray-400">{{ $third->origin }}</p>
                <p class="font-display font-black text-orange-500 text-xl mt-2">{{ number_format($third->votes) }}</p>
                <p class="text-xs text-gray-400">suara</p>
            </div>
        </div>
    </div>
    @endif

    {{-- TABEL LENGKAP --}}
    <div class="bg-white border border-orange-100 rounded-2xl overflow-hidden shadow-sm">
        <div class="px-6 py-4 border-b border-orange-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900 text-lg">Peringkat Lengkap</h2>
            <a href="{{ route('voting.index') }}"
               class="text-sm font-semibold text-orange-500 hover:text-orange-700 transition-colors">
                + Vote Sekarang
            </a>
        </div>
        <div class="divide-y divide-gray-50">
            @foreach($candidates as $candidate)
            @php
                $maxVotes = $candidates->first()?->votes ?: 1;
                $barPct   = round(($candidate->votes / $maxVotes) * 100);
                $rankEmoji = match($candidate->rank) { 1 => '🥇', 2 => '🥈', 3 => '🥉', default => '' };
            @endphp
            <div class="px-6 py-4 flex items-center gap-4 hover:bg-orange-50/50 transition-colors">
                {{-- Rank --}}
                <div class="w-10 flex-shrink-0 text-center">
                    @if($rankEmoji)
                        <span class="text-2xl">{{ $rankEmoji }}</span>
                    @else
                        <span class="font-display font-black text-gray-400 text-lg">{{ $candidate->rank }}</span>
                    @endif
                </div>

                {{-- Avatar --}}
                <div class="w-12 h-12 flex-shrink-0 rounded-xl flex items-center justify-center text-2xl"
                     style="background: {{ $candidate->bg_color }}">
                    {{ $candidate->emoji }}
                </div>

                {{-- Info + bar --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 mb-1">
                        <p class="font-bold text-gray-900 text-sm truncate">{{ $candidate->name }}</p>
                        <span class="flex-shrink-0 text-xs bg-orange-100 text-orange-700 px-2 py-0.5 rounded-full">
                            {{ $candidate->category->name }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 mb-2">📍 {{ $candidate->origin }}</p>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full rounded-full"
                             style="width: {{ $barPct }}%;
                                    background: linear-gradient(90deg, #F97316, #C2410C);
                                    transition: width 0.6s ease">
                        </div>
                    </div>
                </div>

                {{-- Votes --}}
                <div class="flex-shrink-0 text-right">
                    <p class="font-display font-black text-orange-500 text-xl">{{ number_format($candidate->votes) }}</p>
                    <p class="text-xs text-gray-400">suara</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="text-center mt-8">
        <a href="{{ route('voting.index') }}"
           class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold px-8 py-3 rounded-xl transition-all duration-200">
            🗳️ Berikan Suaramu Sekarang
        </a>
    </div>
</div>

@endsection
