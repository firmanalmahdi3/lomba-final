<nav class="sticky top-0 z-50 shadow-lg"
     style="background: linear-gradient(135deg, #1E3A8A 0%, #1D4ED8 60%, #F97316 100%)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="text-2xl">🎭</span>
                <span class="font-display text-white font-black text-xl tracking-tight">
                    Festival Film Pendek <span class="text-orange-200">Blitar</span>
                </span>
            </a>

            {{-- Desktop Links --}}
            <div class="hidden md:flex items-center gap-1">
                @php
                    $navLinks = [
                        'home'             => 'Home',
                        'about'            => 'About Us',
                        'voting.index'     => 'Voting',
                    ];
                @endphp
                @foreach($navLinks as $route => $label)
                    <a href="{{ route($route) }}"
                       class="px-4 py-5 text-sm font-semibold border-b-3 transition-all duration-200
                              {{ request()->routeIs(explode('.', $route)[0] . '*') && request()->routeIs($route)
                                 ? 'text-white border-orange-300 bg-white/10'
                                 : 'text-white/80 border-transparent hover:text-white hover:bg-white/10 hover:border-orange-200' }}"
                       style="border-bottom-width: 3px;">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- Mobile menu button --}}
            <button id="mobile-menu-btn" class="md:hidden text-white p-2 rounded-lg hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="md:hidden hidden pb-4">
            @foreach($navLinks as $route => $label)
                <a href="{{ route($route) }}"
                   class="block px-4 py-3 text-sm font-semibold text-white/80 hover:text-white hover:bg-white/10 rounded-lg">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>
</nav>

<script>
document.getElementById('mobile-menu-btn').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});
</script>
