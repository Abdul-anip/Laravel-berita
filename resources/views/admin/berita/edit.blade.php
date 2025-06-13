<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h2 class="text-2xl font-semibold mb-6">Edit Berita</h2>

            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    @error('judul')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="isi" class="block text-sm font-medium text-gray-700">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="8" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('isi', $berita->isi) }}</textarea>
                    @error('isi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto (opsional)</label>
                    <input type="file" name="foto" id="foto" class="mt-1 block w-40 h-40" accept="image/*">
                    @if($berita->foto)
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita" class="mt-2 max-w-xs h-auto rounded shadow">
                    @endif
                    @error('foto')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $berita->penulis) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    @error('penulis')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.berita.index') }}" class="mr-3 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Batal
                    </a>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
