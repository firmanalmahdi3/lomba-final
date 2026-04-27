@php $candidate = $candidate ?? null; @endphp

<div class="px-6 py-5 space-y-4">

    {{-- Name --}}
    <div>
        <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Nama Kandidat *</label>
        <input type="text" name="name" value="{{ old('name', $candidate?->name) }}"
               class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink @error('name') border-red-400 @enderror"
               placeholder="Nama film / peserta" required>
        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Category --}}
    <div>
        <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Kategori *</label>
        <select name="category_id"
                class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink @error('category_id') border-red-400 @enderror" required>
            <option value="">Pilih kategori...</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $candidate?->category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->icon }} {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Description --}}
    <div>
        <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Deskripsi</label>
        <textarea name="description" rows="3"
                  class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink resize-none"
                  placeholder="Sinopsis atau keterangan film...">{{ old('description', $candidate?->description) }}</textarea>
    </div>

    {{-- YouTube --}}
    <div>
        <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Link YouTube</label>
        <input type="url" name="youtube_url" value="{{ old('youtube_url', $candidate?->youtube_url) }}"
               class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink @error('youtube_url') border-red-400 @enderror"
               placeholder="https://youtu.be/...">
        @error('youtube_url')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Emoji + Votes (row) --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Emoji</label>
            <input type="text" name="emoji" value="{{ old('emoji', $candidate?->emoji ?? '🎬') }}"
                   class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink"
                   placeholder="🎬">
        </div>
        @if($candidate)
        <div>
            <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Jumlah Suara</label>
            <input type="number" name="votes" value="{{ old('votes', $candidate->votes) }}" min="0"
                   class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink">
        </div>
        @endif
    </div>

    {{-- Status --}}
    <div class="flex items-center gap-3">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" id="is_active" value="1"
               class="w-4 h-4 accent-ink rounded"
               {{ old('is_active', $candidate?->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium text-ink cursor-pointer">Kandidat aktif (tampil di halaman voting)</label>
    </div>

</div>
