@extends('layouts.app')

@section('title', 'Beranda — Festival Lampung')

@section('content')

{{-- HERO --}}
<section class="relative overflow-hidden py-24 text-center"
         style="background: linear-gradient(160deg, #1E3A8A 0%, #1D4ED8 45%, #C2410C 100%)">
    {{-- Pattern overlay --}}
    <div class="absolute inset-0 opacity-5"
         style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E\")">
    </div>

    <div class="relative max-w-4xl mx-auto px-6">
        <span class="inline-block bg-orange-500/25 border border-orange-400/50 text-orange-200
                     text-xs font-bold tracking-widest uppercase px-5 py-2 rounded-full mb-6">
            ✦ Festival Budaya 2025
        </span>
        <h1 class="font-display text-white text-5xl md:text-6xl font-black leading-tight mb-4 drop-shadow-lg">
            Festival <span class="text-orange-200">Lampung</span><br>
            Seni &amp; Budaya Nusantara
        </h1>
        <p class="text-white/80 text-lg max-w-xl mx-auto mb-8 leading-relaxed">
            Rayakan keindahan seni dan budaya Lampung bersama kami. Dukung peserta favoritmu
            dan jadilah bagian dari perayaan terbesar tahun ini!
        </p>
        <div class="flex gap-3 justify-center flex-wrap">
            <a href="{{ route('voting.index') }}"
               class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 shadow-lg">
                Mulai Voting 🗳️
            </a>
            <a href="{{ route('about') }}"
               class="border-2 border-white/40 hover:border-white hover:bg-white/10 text-white font-bold px-8 py-4 rounded-xl transition-all duration-200">
                Tentang Festival
            </a>
        </div>
    </div>
</section>

{{-- STATS BAR --}}
<div class="bg-white border-b border-orange-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-6 py-6 flex justify-center gap-16 flex-wrap">
        @php $statItems = [
            [$stats['total_votes'],      'Total Suara'],
            [$stats['total_candidates'], 'Peserta'],
            [$stats['total_categories'], 'Kategori'],
            [$stats['days_remaining'],   'Hari Tersisa'],
        ] @endphp
        @foreach($statItems as [$num, $label])
        <div class="text-center">
            <div class="font-display text-3xl font-black text-orange-500">
                {{ number_format($num) }}
            </div>
            <div class="text-xs text-gray-500 font-semibold mt-1 uppercase tracking-wide">{{ $label }}</div>
        </div>
        @endforeach
    </div>
</div>

{{-- FITUR --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="text-center mb-12">
        <span class="inline-block bg-orange-100 text-orange-700 text-xs font-bold tracking-widest uppercase px-4 py-2 rounded-full mb-3">
            Kenapa Ikut Festival?
        </span>
        <h2 class="font-display text-4xl font-black text-gray-900 mb-3">Perayaan Seni &amp; Budaya Terbesar</h2>
        <div class="w-16 h-1.5 rounded-full mx-auto mb-4" style="background: linear-gradient(90deg, #F97316, #1D4ED8)"></div>
        <p class="text-gray-500 max-w-xl mx-auto leading-relaxed">
            Festival Lampung menghadirkan pengalaman budaya autentik yang menghubungkan masyarakat
            dengan warisan leluhur.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @php $features = [
            ['🎭', 'bg-orange-100', 'Seni Pertunjukan',   'Tari tradisional, musik daerah, dan drama budaya yang memukau dari seluruh pelosok Lampung.'],
            ['🏆', 'bg-blue-100',   'Kompetisi Bergengsi', 'Raih penghargaan tertinggi dalam berbagai kategori seni dengan hadiah total ratusan juta rupiah.'],
            ['🗳️', 'bg-orange-100', 'Voting Publik',      'Suaramu menentukan pemenang! Setiap warga berhak memberikan suara untuk peserta favorit mereka.'],
            ['🤝', 'bg-blue-100',   'Komunitas Bersatu',  'Mempererat tali silaturahmi antar komunitas seni dan budaya di seluruh Provinsi Lampung.'],
        ] @endphp
        @foreach($features as [$icon, $iconBg, $title, $desc])
        <div class="bg-white border border-orange-100 rounded-2xl p-6 hover:-translate-y-1 hover:shadow-xl transition-all duration-200">
            <div class="w-14 h-14 {{ $iconBg }} rounded-xl flex items-center justify-center text-2xl mb-5">{{ $icon }}</div>
            <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $title }}</h3>
            <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- TOP KANDIDAT --}}
@if($topCandidates->count())
<section class="bg-white border-y border-orange-100 py-20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="inline-block bg-blue-100 text-blue-700 text-xs font-bold tracking-widest uppercase px-4 py-2 rounded-full mb-3">
                Saat Ini Terdepan
            </span>
            <h2 class="font-display text-4xl font-black text-gray-900">Top Peserta</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($topCandidates as $i => $candidate)
            <div class="border border-orange-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all duration-200">
                <div class="h-36 flex items-center justify-center text-5xl relative"
                     style="background: {{ $candidate->bg_color }}">
                    {{ $candidate->emoji }}
                    <span class="absolute top-3 left-3 w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold
                                 {{ $i === 0 ? 'bg-amber-400' : ($i === 1 ? 'bg-gray-400' : ($i === 2 ? 'bg-amber-700' : 'bg-blue-600')) }}">
                        {{ $i + 1 }}
                    </span>
                </div>
                <div class="p-4 bg-white">
                    <p class="font-bold text-gray-900 text-sm">{{ $candidate->name }}</p>
                    <p class="text-xs text-gray-400 mb-3">📍 {{ $candidate->origin }}</p>
                    <div class="text-xs text-gray-400 flex justify-between mb-1">
                        <span>{{ number_format($candidate->votes) }} suara</span>
                        <span>{{ $candidate->vote_bar_percentage }}%</span>
                    </div>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full rounded-full vote-bar-fill"
                             style="width: {{ $candidate->vote_bar_percentage }}%;
                                    background: linear-gradient(90deg, #F97316, #C2410C)">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('voting.index') }}"
               class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold px-8 py-3 rounded-xl transition-all duration-200">
                Lihat Semua Peserta & Vote →
            </a>
        </div>
    </div>
</section>
@endif

@endsection
