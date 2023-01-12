<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\movie_genres;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view("movie.index", compact('movies'));
    }

    public function create() {

        $genre = Genre::all();

        return view("movie.create", compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->fileUrl = $request->url;
        $movie->rated = $request->rated;
        $movie->popular = $request->popular;
        $movie->release_date = $request->release;
        $movie->age_restricted = $request->age;

        // Upload file
        $path = $request->file('poster')->store('posters');
        $movie->poster = $path;

        $movie->save();
        $id = $movie->id;
        // Genres relationship
        foreach($request->genre as $g) {
            $mg = new movie_genres();
            $mg->movie_id = $id;
            $mg->genre_id = Genre::find($g)->id;

            $mg->save();
        }

        return redirect('/movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
