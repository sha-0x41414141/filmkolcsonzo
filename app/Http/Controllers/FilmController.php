<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Film;

class FilmController extends Controller
{
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('films.show', ['film' => $film]);
    }
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        Film::destroy($id);
        return redirect()->back()->with('success', "Film deleted.");
    }
    public function index(Request $request)
    {
        $films = Film::whereDoesntHave('rents', function ($query) {
            $query->whereNull('rent_end');
            if (isset($request->film_title))
            {
                $query->where('film_title', '=', $request->film_title);
            }
            if (isset($request->film_director))
            {
                $query->where('film_director', '=', $request->film_director);
            }
        })->get();
        return view("films.index", compact('films'));
    }
    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'film_title' => 'required|string|max:255',
            'film_director' => 'required|string|max:255',
            'genre_id' => 'required|integer|min:0|exists:genres,id',
            'film_year' => 'required|string|max:255'
        ]);

        Film::create([
            'film_title' => $request->film_title,
            'film_director' => $request->film_director,
            'genre_id' => $request->genre_id,
            'film_year' => $request->film_year
        ]);
        
        return redirect()->back()->with('success', 'Film stored.');
    }
}
