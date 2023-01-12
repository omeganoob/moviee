<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\movie_genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genre = Genre::all();

        foreach($genre as $g) {
            $g->totalMovie = movie_genres::where('genre_id', $g->id)->count();
        }

        return view('genre.index', compact('genre'));
    }

    public function create() {
        return view('genre.create');
    }

    public function store(Request $request) {
        $g = new Genre();
        $g->name = $request->name;
        $g->save();

        return redirect('/genres');
    }
}
