@extends('admin.layout')

@section('title', 'Pengguna')
@section('page-title', 'Pengguna')
@section('page-subtitle', 'Kelola akun pengguna')

@section('content')

{{-- Filter --}}
<form method="GET" class="bg-white border border-ink-100 rounded-2xl p-4 mb-6 flex flex-wrap gap-3 items-end">
    <div>
        <label class="text-xs text-ink-500 font-medium block mb-1">Cari</label>
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Nama atau email..."
               class="border border-ink-200 rounded-xl px-3 py-2 text-sm text-ink placeholder-ink-200 focus:outline-none focus:border-ink w-60">
    </div>
    <button type="submit" class="bg-ink text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-ink-700 transition-colors">Cari</button>
    <a href="{{ route('admin.users.index') }}" class="text-sm text-ink-500 hover:text-ink py-2">Reset</a>
</form>

<div class="bg-white rounded-2xl border border-ink-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-ink-50 text-left">
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Pengguna</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Role</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Daftar</th>
                <th class="px-6 py-3 text-xs font-semibold text-ink-500">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-ink-100">
            @forelse($users as $user)
            <tr class="hover:bg-ink-50 transition-colors">
                <td class="px-6 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-ink flex items-center justify-center text-white text-xs font-bold shrink-0">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-semibold text-ink">{{ $user->name }}</p>
                            <p class="text-xs text-ink-500">{{ $user->email }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-3">
                    @if($user->is_admin)
                        <span class="bg-accent/10 text-accent text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Admin</span>
                    @else
                        <span class="bg-ink-100 text-ink-500 text-[10px] font-semibold px-2 py-0.5 rounded-full">User</span>
                    @endif
                </td>
                <td class="px-6 py-3 text-xs text-ink-500">{{ $user->created_at->format('d M Y') }}</td>
                <td class="px-6 py-3">
                    <div class="flex items-center gap-2">
                        {{-- Toggle Admin --}}
                        @if($user->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}">
                            @csrf
                            <button type="submit"
                                    class="text-xs {{ $user->is_admin ? 'bg-orange-100 text-orange-600 hover:bg-orange-500' : 'bg-ink-100 text-ink hover:bg-ink' }} hover:text-white px-3 py-1.5 rounded-lg font-medium transition-colors">
                                {{ $user->is_admin ? 'Cabut Admin' : 'Jadikan Admin' }}
                            </button>
                        </form>

                        {{-- Hapus --}}
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                              onsubmit="return confirm('Hapus user {{ $user->name }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs bg-red-100 hover:bg-accent hover:text-white text-accent px-3 py-1.5 rounded-lg font-medium transition-colors">Hapus</button>
                        </form>
                        @else
                            <span class="text-xs text-ink-200 italic">Akun saya</span>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-12 text-center text-ink-500">Tidak ada pengguna ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($users->hasPages())
    <div class="px-6 py-4 border-t border-ink-100">
        {{ $users->links() }}
    </div>
    @endif
</div>

@endsection
