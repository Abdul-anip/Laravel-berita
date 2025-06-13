{{-- resources/views/admin/berita/show.blade.php --}}
<x-admin-layout>
    <div class="bg-white dark:bg-gray-900 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">Detail Berita</h2>

        <div class="mb-4">
            <img src="{{ Storage::url($berita->foto) }}" alt="{{ $berita->judul }}" class="w-40 h-50 object-cover rounded shadow">
        </div>

        <h3 class="text-xl font-bold mb-2">{{ $berita->judul }}</h3>
        <p class="text-sm text-gray-500 mb-1">Penulis: {{ $berita->penulis }}</p>
        <p class="text-sm text-gray-500 mb-4">Tanggal: {{ $berita->created_at->format('d M Y') }}</p>

        <div class="prose dark:prose-invert max-w-none">
            {!! nl2br(e($berita->konten)) !!}
        </div>
    </div>
</x-admin-layout>
