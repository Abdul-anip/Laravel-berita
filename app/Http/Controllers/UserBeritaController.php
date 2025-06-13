<?php
// app/Http/Controllers/UserBeritaController.php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class UserBeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(12);
        return view('user.berita.index', compact('berita'));
    }

    public function show(Berita $berita)
    {
        return view('user.berita.show', compact('berita'));
    }
}