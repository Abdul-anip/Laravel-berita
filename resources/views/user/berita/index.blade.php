{{-- resources/views/user/berita/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita Terbaru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($berita as $item)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="w-48 h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">{{ $item->judul }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($item->isi, 100) }}</p>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>{{ $item->penulis }}</span>
                                <span>{{ $item->created_at->format('d/m/Y') }}</span>
                            </div>
                            <a href="{{ route('berita.show', $item) }}" class="inline-block mt-4 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500">Belum ada berita tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $berita->links() }}
            </div>
        </div>
    </div>
</x-app-layout>