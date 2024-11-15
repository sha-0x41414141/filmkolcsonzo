<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class FilmController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }
}
