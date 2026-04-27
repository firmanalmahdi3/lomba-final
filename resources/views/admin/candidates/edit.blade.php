@extends('admin.layout')

@section('title', 'Edit Kandidat')
@section('page-title', 'Edit Kandidat')
@section('page-subtitle', '{{ $candidate->name }}')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-ink-100 overflow-hidden">
        <form method="POST" action="{{ route('admin.candidates.update', $candidate) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.candidates._form')

            <div class="px-6 py-4 border-t border-ink-100 flex items-center gap-3">
                <button type="submit"
                        class="bg-ink text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-ink-700 transition-colors">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.candidates.index') }}" class="text-sm text-ink-500 hover:text-ink">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
