@extends('admin.layout')

@section('title', 'Kategori')
@section('page-title', 'Kategori')
@section('page-subtitle', 'Kelola kategori lomba')

@section('header-actions')
    <a href="{{ route('admin.categories.create') }}"
       class="bg-ink text-white text-sm font-semibold px-4 py-2 rounded-xl hover:bg-ink-700 transition-colors flex items-center gap-2">
        <span>+</span> Tambah Kategori
    </a>
@endsection

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($categories as $category)
    <div class="bg-white rounded-2xl border border-ink-100 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between mb-3">
            <span class="text-3xl">{{ $category->icon }}</span>
            <span class="bg-ink-100 text-ink-500 text-[10px] font-semibold px-2 py-0.5 rounded-full">
                {{ $category->candidates_count }} kandidat
            </span>
        </div>
        <h3 class="font-bold text-ink mb-1">{{ $category->name }}</h3>
        <p class="text-xs text-ink-500 mb-1 font-mono">{{ $category->slug }}</p>
        <p class="text-xs text-ink-500 mb-4 line-clamp-2">{{ $category->description }}</p>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.categories.edit', $category) }}"
               class="text-xs bg-ink-100 hover:bg-ink hover:text-white text-ink px-3 py-1.5 rounded-lg font-medium transition-colors">
                Edit
            </a>
            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                  onsubmit="return confirm('Hapus kategori {{ $category->name }}?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="text-xs bg-red-100 hover:bg-accent hover:text-white text-accent px-3 py-1.5 rounded-lg font-medium transition-colors">
                    Hapus
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-3 py-16 text-center text-ink-500">
        <p class="text-4xl mb-3">📂</p>
        <p>Belum ada kategori. <a href="{{ route('admin.categories.create') }}" class="text-accent underline">Tambah sekarang</a>.</p>
    </div>
    @endforelse
</div>

@endsection
