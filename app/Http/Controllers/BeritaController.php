<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|string|min:10|max:255',
            'isi' => 'required|string|min:50',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis' => 'required|string|max:100',
        ]);

        $foto = $request->file('foto');
        $fotoPath = $foto->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $fotoPath,
            'penulis' => $request->penulis,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $berita = Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $berita = Berita::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|min:10|max:255',
        'isi' => 'required|string|min:50',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'penulis' => 'required|string|max:100',
    ]);

    $data = [
        'judul' => $request->judul,
        'isi' => $request->isi,
        'penulis' => $request->penulis,
    ];

    if ($request->hasFile('foto')) {
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        $data['foto'] = $request->file('foto')->store('berita', 'public');
    }

    $berita->update($data);

    return redirect()->route('admin.berita.index')
        ->with('success', 'Berita berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
{
    $berita = Berita::findOrFail($id);

    // Hapus file foto jika ada
    if ($berita->foto) {
        Storage::disk('public')->delete($berita->foto);
    }

    $berita->delete();

    return redirect()->route('admin.berita.index')
        ->with('success', 'Berita berhasil dihapus.');
}


}
