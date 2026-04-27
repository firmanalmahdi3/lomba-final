<footer class="bg-black text-white/70 mt-auto">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-8">

            {{-- Brand --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="font-display text-[#ed8036] font-black text-xl">Festival Film Pendek Blitar</span>
                </div>
                <p class="text-sm leading-relaxed">
                    Membangun Blitar demi generasi yang akan datang.
                </p>
            </div>

            {{-- Navigasi --}}
            <div>
                <h4 class="text-white font-bold text-sm mb-4 uppercase tracking-widest">Navigasi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}"             class="hover:text-[#ed8036] transition-colors">Beranda</a></li>
                    <li><a href="{{ route('about') }}"            class="hover:text-[#ed8036] transition-colors">About Us</a></li>
                    <li><a href="{{ route('voting.index') }}"     class="hover:text-[#ed8036] transition-colors">Voting</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h4 class="text-white font-bold text-sm mb-4 uppercase tracking-widest">Kontak</h4>
                <ul class="space-y-2 text-sm">
                    <li>📧 firmanalmahdi3@gmail.com</li>
                    <li>📞 085852760103</li>
                    <li>📍 Kota Blitar, Jawa Timur, Indonesia</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 flex flex-col sm:flex-row justify-between gap-2 text-xs">
            <span>© {{ date('Y') }} Festival Film Pendek Blitar. Hak cipta dilindungi.</span>
            <span>Dibuat dengan ❤️ untuk Blitar SAE</span>
        </div>
    </div>
</footer>
