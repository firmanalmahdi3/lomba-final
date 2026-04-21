@extends('layouts.app')

@section('title', 'About Us — Festival Lampung')

@section('content')

{{-- HERO --}}
<section class="py-20 text-center" style="background: linear-gradient(135deg, #1E3A8A, #1D4ED8)">
    <div class="max-w-3xl mx-auto px-6">
        <span class="inline-block bg-white/15 border border-white/30 text-blue-100 text-xs font-bold tracking-widest uppercase px-5 py-2 rounded-full mb-5">
            Tentang Kami
        </span>
        <h1 class="font-display text-white text-5xl font-black mb-3">About Us</h1>
        <p class="text-white/70 text-lg">Mengenal Festival Lomba Film Pendek Lebih Dalam</p>
    </div>
</section>

{{-- KONTEN ABOUT --}}
<section class="max-w-6xl mx-auto px-6 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- Latar Belakang --}}
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-orange-500">
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
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-blue-600">
            <h3 class="font-bold text-blue-900 text-xl mb-4 flex items-center gap-2">
                🎯 Tujuan
            </h3>
            <ul class="space-y-3">
                @php $tujuan = [
                    'Melestarikan dan mengembangkan seni budaya asli Lampung agar tidak punah',
                    'Memberikan ruang apresiasi bagi seniman dan budayawan lokal',
                    'Meningkatkan pariwisata budaya dan ekonomi kreatif daerah',
                    'Menumbuhkan rasa bangga dan cinta terhadap warisan leluhur',
                    'Mempererat persatuan masyarakat Lampung yang beragam',
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
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-orange-500">
            <h3 class="font-bold text-blue-900 text-xl mb-4 flex items-center gap-2">
                🎪 Sasaran
            </h3>
            <ul class="space-y-3">
                @php $sasaran = [
                    'Seniman dan pengrajin budaya dari 15 kabupaten/kota di Lampung',
                    'Pelajar dan generasi muda sebagai penerus kebudayaan',
                    'Komunitas seni dan sanggar tari tradisional',
                    'Wisatawan lokal dan mancanegara',
                    'Pelaku usaha ekonomi kreatif dan UMKM',
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
        <div class="bg-white border border-orange-100 rounded-2xl p-8 border-t-4 border-t-blue-600">
            <h3 class="font-bold text-blue-900 text-xl mb-4 flex items-center gap-2">
                🌐 Ruang Lingkup
            </h3>
            <ul class="space-y-3">
                @php $ruangLingkup = [
                    'Tari tradisional dan kontemporer berbasis budaya Lampung',
                    'Musik daerah: gamolan, serdam, dan alat musik khas Lampung',
                    'Kerajinan tangan: tenun tapis, anyaman, ukiran kayu',
                    'Kuliner tradisional dan festival makanan khas daerah',
                    'Pertunjukan teater dan drama budaya kolosal',
                    'Pameran fotografi dan seni visual bertema budaya',
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

{{-- TIMELINE --}}
<section class="bg-white border-y border-orange-100 py-16">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12">
            <span class="inline-block bg-orange-100 text-orange-700 text-xs font-bold tracking-widest uppercase px-4 py-2 rounded-full mb-3">
                Perjalanan Kami
            </span>
            <h2 class="font-display text-4xl font-black text-gray-900">Sejarah Festival</h2>
        </div>
        <div class="space-y-6">
            @php $timeline = [
                ['2010', 'Pendirian',          'Festival Lampung pertama kali diselenggarakan dengan 50 peserta dari 5 kabupaten.'],
                ['2015', 'Ekspansi Regional',  'Festival berkembang mencakup seluruh 15 kabupaten/kota di Provinsi Lampung.'],
                ['2019', 'Pengakuan Nasional', 'Festival Lampung mendapat pengakuan dari Kementerian Pariwisata sebagai festival budaya unggulan.'],
                ['2023', 'Era Digital',        'Sistem voting online diluncurkan, memungkinkan masyarakat berpartisipasi dari seluruh Indonesia.'],
                ['2025', 'Festival ke-15',     'Perayaan emas 15 tahun dengan 24 peserta terbaik dari seluruh Lampung.'],
            ] @endphp
            @foreach($timeline as [$year, $title, $desc])
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-20 text-right">
                    <span class="font-display font-black text-orange-500 text-xl">{{ $year }}</span>
                </div>
                <div class="w-px bg-orange-200 self-stretch relative">
                    <div class="absolute top-1.5 -left-1.5 w-3 h-3 rounded-full bg-orange-500"></div>
                </div>
                <div class="pb-6">
                    <h4 class="font-bold text-gray-900 mb-1">{{ $title }}</h4>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
