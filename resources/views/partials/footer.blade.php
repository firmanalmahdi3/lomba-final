<footer class="bg-[#1E3A8A] text-white/70 mt-auto">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-8">

            {{-- Brand --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="text-2xl">🎭</span>
                    <span class="font-display text-white font-black text-xl">FestivalLampung</span>
                </div>
                <p class="text-sm leading-relaxed">
                    Merayakan kekayaan seni dan budaya Lampung demi generasi yang akan datang.
                </p>
            </div>

            {{-- Navigasi --}}
            <div>
                <h4 class="text-white font-bold text-sm mb-4 uppercase tracking-widest">Navigasi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}"             class="hover:text-orange-300 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('about') }}"            class="hover:text-orange-300 transition-colors">About Us</a></li>
                    <li><a href="{{ route('voting.index') }}"     class="hover:text-orange-300 transition-colors">Voting</a></li>
                    <li><a href="{{ route('voting.leaderboard') }}" class="hover:text-orange-300 transition-colors">Leaderboard</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h4 class="text-white font-bold text-sm mb-4 uppercase tracking-widest">Kontak</h4>
                <ul class="space-y-2 text-sm">
                    <li>📧 info@festivallampung.id</li>
                    <li>📞 (0721) 123-4567</li>
                    <li>📍 Bandar Lampung, Lampung</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 flex flex-col sm:flex-row justify-between gap-2 text-xs">
            <span>© {{ date('Y') }} Festival Lampung. Hak cipta dilindungi.</span>
            <span>Dibuat dengan ❤️ untuk budaya Lampung</span>
        </div>
    </div>
</footer>
