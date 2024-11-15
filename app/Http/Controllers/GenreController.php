<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'genre_name' => 'required|string|max:255'
        ]);

        Genre::create([
            'genre_name' => $request->genre_name
        ]);

        return redirect()->back()->with('success', 'Genre stored.');
    }
}
