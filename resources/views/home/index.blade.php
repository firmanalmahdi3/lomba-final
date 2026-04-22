@extends('layouts.app')

@section('title', 'Beranda — Festival Film Pendek Blitar')

@section('content')

{{-- HERO --}}
<section class="relative overflow-hidden py-24 text-center"
         style="background: #00bdd7;">                                                  
    {{-- Pattern overlay --}}
    <div class="absolute inset-0 opacity-5"
         style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E\")">
    </div>

    <div class="relative max-w-4xl mx-auto px-6">
        <span class="inline-block bg-white/10 border border-white/80 text-white
                     text-xs font-bold tracking-widest uppercase px-5 py-2 rounded-full mb-6">
            ✦ Festival Lomba Film Pendek ✦
        </span>
        <h1 class="font-display text-white text-5xl md:text-6xl font-black leading-tight mb-4 drop-shadow-lg">
            Festival Film Pendek <span class="text-[#ed8036]">Blitar</span>
        </h1>
        <p class="text-white text-lg max-w-xl mx-auto mb-8 leading-relaxed">
           Dukung peserta favoritmu
        </p>
        <div class="flex gap-3 justify-center flex-wrap">
            <a href="{{ route('voting.index') }}"
               class="bg-[#ed8036] hover:bg-orange-600 text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 shadow-lg">
                Mulai Voting
            </a>
            <a href="{{ route('about') }}"
               class="border-2 border-white/40 hover:border-white hover:bg-white/10 text-white font-bold px-8 py-4 rounded-xl transition-all duration-200">
                Tentang Festival
            </a>
        </div>
    </div>
</section>

{{-- FITUR --}}
<section class="max-w-6xl mx-auto px-6 py-20">
    <div class="text-center mb-12">
        <span class="inline-block bg-[#ed8036] text-black text-xs font-bold tracking-widest uppercase px-4 py-2 rounded-full mb-3">
            Kenapa Ikut Festival?
        </span>
        <h2 class="font-display text-4xl font-black text-gray-900 mb-3">Festival Film terbesar di Blitar</h2>
        <div class="w-16 h-1.5 rounded-full mx-auto mb-4" style="background: #ed8036"></div>
        <p class="text-gray-500 max-w-xl mx-auto leading-relaxed">
            Jadikan dirimu pemenang dan bawa hadiah menarik serta kesempatan untuk dikenal di dunia perfilman! Festival Film Pendek Blitar adalah platform sempurna untuk menampilkan bakatmu, mendapatkan pengakuan, dan merayakan seni serta budaya melalui karya-karyamu. Jangan lewatkan kesempatan emas ini untuk bersinar dan menginspirasi banyak orang dengan cerita yang kamu buat!
        </p>
    </div>

    {{-- PENGHARGAAN --}}
    <section class="max-w-6xl mx-auto px-6 py-20">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @php 
    $awards = [
    [
    '🏆',
    'bg-orange-[#ed8036]',
    'A. Kategori Masyarakat',
    'Juara 1: Rp5.000.000 + Sertifikat + Trophy
    Juara 2: Rp3.000.000 + Sertifikat + Trophy
    Juara 3: Rp2.500.000 + Sertifikat + Trophy
    Favorit: Rp1.000.000 + Sertifikat + Trophy
    Best Director: Rp1.500.000 + Sertifikat + Trophy'
    ],
    [
    '🎓',
    'bg-blue-[#ed8036]',
    'B. Kategori Pelajar',
    'Juara 1: Rp3.000.000 + Sertifikat + Trophy
    Juara 2: Rp2.000.000 + Sertifikat + Trophy
    Juara 3: Rp1.500.000 + Sertifikat + Trophy
    Favorit: Rp1.000.000 + Sertifikat + Trophy
    Best Director: Rp750.000 + Sertifikat + Trophy'
    ],
    [
    '🎬',
    'bg-orange-[#ed8036]',
    'C. Kategori KIM',
    'Juara 1: Rp5.000.000 + Sertifikat + Trophy
    Juara 2: Rp3.000.000 + Sertifikat + Trophy
    Juara 3: Rp2.500.000 + Sertifikat + Trophy
    Favorit: Rp1.000.000 + Sertifikat + Trophy
    Best Director: Rp1.500.000 + Sertifikat + Trophy'
    ],
    [
    '⭐',
    'bg-blue-[#ed8036]',
    'D. Penghargaan Umum',
    'Best Actor/Actress: Rp1.500.000 + Sertifikat + Trophy
    Tata Artistik Terbaik: Rp1.500.000 + Sertifikat + Trophy
    Poster Terbaik: Rp1.000.000 + Sertifikat + Trophy
    Best Director: Rp500.000 + Sertifikat + Trophy'
    ],
    ];
    @endphp

    @foreach($awards as [$icon, $iconBg, $title, $desc])
    <div class="bg-white border border-[#ed8036]/40 rounded-2xl p-6 hover:-translate-y-1 hover:shadow-xl transition-all duration-200">
        
        <div class="w-14 h-14 {{ $iconBg }} rounded-xl flex items-center justify-center text-2xl mb-5">
            {{ $icon }}
        </div>

        <h3 class="font-bold text-gray-900 text-lg mb-3">{{ $title }}</h3>

        <p class="text-gray-500 text-sm leading-relaxed whitespace-pre-line">
            {{ $desc }}
        </p>

    </div>
    @endforeach
</div>
    </section>
</section>

@endsection
