@php $category = $category ?? null; @endphp

<div class="px-6 py-5 space-y-4">
    <div>
        <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Nama Kategori *</label>
        <input type="text" name="name" value="{{ old('name', $category?->name) }}"
               class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink @error('name') border-red-400 @enderror"
               placeholder="Contoh: Kategori Masyarakat" required>
        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Icon (Emoji)</label>
        <input type="text" name="icon" value="{{ old('icon', $category?->icon) }}"
               class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink"
               placeholder="👥">
    </div>

    <div>
        <label class="text-xs font-semibold text-ink-500 uppercase tracking-wide block mb-1.5">Deskripsi</label>
        <textarea name="description" rows="3"
                  class="w-full border border-ink-200 rounded-xl px-4 py-2.5 text-sm text-ink focus:outline-none focus:border-ink resize-none"
                  placeholder="Keterangan kategori...">{{ old('description', $category?->description) }}</textarea>
    </div>
</div>
