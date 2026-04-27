@extends('layouts.app')

@section('title', 'About Us — Festival Film Pendek Blitar')

@section('content')

{{-- HERO --}}
<section class="py-20 text-center" style="background: #00bdd7;">
    <div class="max-w-3xl mx-auto px-6">
        <h1 class="font-display text-white text-5xl font-black mb-3">About Us</h1>
        <p class="text-white text-lg">Mengenal Festival Lomba Film Pendek Lebih Dalam</p>
    </div>
</section>

{{-- KONTEN ABOUT --}}
<section class="max-w-6xl mx-auto px-6 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Latar Belakang --}}
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-[#ed8036]">
            <h3 class="font-bold text-blue-900 text-xl mb-4 flex items-center gap-2">
                Latar Belakang
            </h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Perkembangan media digital mendorong masyarakat dan pelajar berkreasi melalui konten audio visual.
                Film pendek menjadi media efektif untuk menyampaikan pesan pembangunan, budaya, dan isu sosial.
            </p>
            <p class="text-gray-500 text-sm leading-relaxed mt-3">
                Di Kota Blitar, pembangunan terus berjalan, namun pemahaman publik tetap penting. Media digital juga mendukung ekonomi kreatif dan komunitas.
                Melalui karya inovatif, masyarakat dapat mengembangkan keterampilan, membuka peluang usaha, serta memperkuat jejaring dan kemandirian ekonomi daerah.
            </p>
        </div>

        {{-- Tujuan --}}
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-[#00bdd7]">
            <h3 class="font-bold text-blue-900 text-xl mb-4 flex items-center gap-2">
                🎯 Tujuan
            </h3>
            <ul class="space-y-3">
                @php $tujuan = [
                    'Memberikan ruang apresiasi dan wadah ekspresi bagi kreativitas masyarakat, pelajar, dan Kelompok Informasi Masyarakat (KIM).',
                    'Memperkuat penyebaran narasi positif terkait pembangunan Kota Blitar.',
                    'Meningkatkan literasi digital serta mendorong produksi konten yang informatif, edukatif, dan bertanggung jawab.',
                    'Meningkatkan literasi digital serta mendorong produksi konten yang informatif, edukatif, dan bertanggung jawab.',
                    'Memperluas jejaring kemitraan pemerintah daerah dalam mendukung diseminasi informasi kepada publik.',
                ] @endphp
                @foreach($tujuan as $item)
                <li class="flex items-start gap-3 text-sm text-gray-500">
                    <span class="text-orange-500 text-xs mt-1 flex-shrink-0">▸</span>
                    <span class="leading-relaxed">{{ $item }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Sasaran --}}
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-[#ed8036]">
            <h3 class="font-bold text-blue-900 text-xl mb-4 flex items-center gap-2">
                🎪 Sasaran
            </h3>
            <ul class="space-y-3">
                @php $sasaran = [
                    'Masyarakat umum',
                    'Pelajar',
                    'dan KIM di Kota Blitar',
                ] @endphp
                @foreach($sasaran as $item)
                <li class="flex items-start gap-3 text-sm text-gray-500">
                    <span class="text-orange-500 text-xs mt-1 flex-shrink-0">▸</span>
                    <span class="leading-relaxed">{{ $item }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Ruang Lingkup --}}
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-[#00bdd7]">
            <h3 class="font-bold text-blue-900 text-xl mb-4 flex items-center gap-2">
                🌐 Ruang Lingkup
            </h3>
            <ul class="space-y-3">
                @php $ruangLingkup = [
                    'Karya: Film pendek naratif durasi 5–10 menit, tema sesuai pembangunan daerah.',
                    'Tujuan: Memberikan ruang apresiasi dan edukasi bagi peserta, sekaligus membangun konten komunikasi publik berkualitas.',
                    'Mitra/Stakeholder : Pelaku Sineas Film, Disbudpar, Perpus Bung Karno, Blitar Art Center',
                ] @endphp
                @foreach($ruangLingkup as $item)
                <li class="flex items-start gap-3 text-sm text-gray-500">
                    <span class="text-orange-500 text-xs mt-1 flex-shrink-0">▸</span>
                    <span class="leading-relaxed">{{ $item }}</span>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</section>
@endsection
