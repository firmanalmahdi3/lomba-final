@extends('admin.layout')

@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')

@section('content')
<div class="max-w-lg">
    <div class="bg-white rounded-2xl border border-ink-100 overflow-hidden">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            @include('admin.categories._form')
            <div class="px-6 py-4 border-t border-ink-100 flex gap-3">
                <button type="submit" class="bg-ink text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-ink-700 transition-colors">Simpan</button>
                <a href="{{ route('admin.categories.index') }}" class="text-sm text-ink-500 hover:text-ink py-2.5">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
