<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Panel Admin Festival Film Blitar</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"DM Sans"', 'sans-serif'],
                        mono: ['"DM Mono"', 'monospace'],
                    },
                    colors: {
                        ink: { DEFAULT: '#0D0D0D', 50: '#F5F5F5', 100: '#E8E8E8', 200: '#D0D0D0', 500: '#666', 700: '#333' },
                        accent: { DEFAULT: '#E63946', light: '#FF6B6B', dark: '#C1121F' },
                        gold: { DEFAULT: '#FFB703', light: '#FFD166' },
                    }
                }
            }
        }
    </script>
    <style>
        * { font-family: 'DM Sans', sans-serif; }
        .font-mono { font-family: 'DM Mono', monospace; }
        body { background: #F5F5F5; }

        .sidebar-link { @apply flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-ink-500 hover:bg-ink-100 hover:text-ink transition-all; }
        .sidebar-link.active { @apply bg-ink text-white; }

        @keyframes slideIn { from { opacity:0; transform:translateX(20px); } to { opacity:1; transform:translateX(0); } }
        .animate-slide { animation: slideIn 0.3s ease forwards; }

        .stat-card { @apply bg-white rounded-2xl p-6 border border-ink-100; }

        ::-webkit-scrollbar { width: 4px; height: 4px; }
        ::-webkit-scrollbar-track { background: #F5F5F5; }
        ::-webkit-scrollbar-thumb { background: #D0D0D0; border-radius: 99px; }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-60 bg-white border-r border-ink-100 flex flex-col fixed h-full z-20">
        {{-- Logo --}}
        <div class="px-6 py-5 border-b border-ink-100">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-ink rounded-lg flex items-center justify-center text-white text-sm font-bold">F</div>
                <div>
                    <p class="text-xs font-semibold text-ink leading-none">Panel Admin</p>
                    <p class="text-[10px] text-ink-500 mt-0.5">Festival Film Blitar</p>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
            <p class="text-[10px] font-semibold text-ink-200 uppercase tracking-widest px-4 mb-2">Menu</p>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.candidates.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.candidates*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Kandidat
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                Kategori
            </a>

            <a href="{{ route('admin.votes.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.votes*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                Data Vote
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Pengguna
            </a>

            <div class="pt-4">
                <p class="text-[10px] font-semibold text-ink-200 uppercase tracking-widest px-4 mb-2">Lainnya</p>
                <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Website
                </a>
            </div>
        </nav>

        {{-- User --}}
        <div class="px-3 py-4 border-t border-ink-100">
            <div class="flex items-center gap-3 px-3 py-2">
                <div class="w-8 h-8 rounded-full bg-accent flex items-center justify-center text-white text-xs font-bold shrink-0">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-ink truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-ink-500 truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                @csrf
                <button type="submit" class="sidebar-link w-full text-accent hover:bg-red-50 hover:text-accent">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 ml-60 min-h-screen flex flex-col">

        {{-- Top bar --}}
        <header class="bg-white border-b border-ink-100 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
            <div>
                <h1 class="text-lg font-bold text-ink">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs text-ink-500 mt-0.5">@yield('page-subtitle', '')</p>
            </div>
            <div class="flex items-center gap-3">
                @yield('header-actions')
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
            <div id="flash" class="mx-8 mt-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl text-sm flex items-center gap-2 animate-slide">
                <span>✅</span> {{ session('success') }}
                <button onclick="document.getElementById('flash').remove()" class="ml-auto text-green-500 hover:text-green-700">✕</button>
            </div>
        @endif
        @if(session('error'))
            <div id="flash" class="mx-8 mt-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-sm flex items-center gap-2 animate-slide">
                <span>⚠️</span> {{ session('error') }}
                <button onclick="document.getElementById('flash').remove()" class="ml-auto text-red-400 hover:text-red-600">✕</button>
            </div>
        @endif

        {{-- Content --}}
        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </main>
</div>

@stack('scripts')
</body>
</html>
