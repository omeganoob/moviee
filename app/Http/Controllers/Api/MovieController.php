<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\movie_genres;
use App\Models\User;
use App\Models\User_Favorites;

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
        $movies = Movie::take(5)->get();

        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function genre($genre_id)
    {
        $movies = Movie::join('movie_genres', 'movie_genres.movie_id', 'movies.id')
            ->where('movie_genres.genre_id', $genre_id)
            ->get(['movies.*']);

        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function age($age)
    {
        $movies = Movie::where('age_restricted', '<=', $age)->get();
        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function favorite($user_id)
    {
        $movies = Movie::join('user_favorites', 'user_favorites.movie_id', 'movies.id')
            ->where('user_favorites.user_id', $user_id)
            ->get(['movies.*']);

        return response()->json([
            'success' => true,
            'user_id' => $user_id,
            'movies' => $movies
        ]);
    }

    public function addToFav(Request $request)
    {
        $movieFavo = User_Favorites::where('user_id', $request->user_id)
            ->where('movie_id', $request->movie_id)->first();

        if (isset($movieFavo)) {
            $movieFavo->delete();
            return response()->json([
                'success' => true,
                'message' => "deleted " . $request->movie_id . " from user with id = " . $request->user_id . "'s favorite list"
            ]);
        } else {
            $movie = new User_Favorites();
            $movie->user_id = $request->user_id;
            $movie->movie_id = $request->movie_id;
            $movie->save();
            return response()->json([
                'success' => true,
                'message' => "added " . $request->movie_id . " to user with id =1" . $request->user_id . "'s favorite list"
            ]);
        }
    }

    public function isfav(Request $request)
    {
        $movieFavo = User_Favorites::where('user_id', $request->user_id)
            ->where('movie_id', $request->movie_id)->first();

        if (isset($movieFavo)) {
            return response()->json([
                'success' => true,
                'isfav' => true
            ]);
        }
        return response()->json([
            'success' => true,
            'isfav' => false
        ]);
    }

    public function getGenre()
    {
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'genre' => $genres
        ]);
    }

    public function toprated()
    {
        $movies = Movie::orderBy('rated', 'desc')->take(10)->get();
        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function popular()
    {
        $movies = Movie::orderBy('popular', 'desc')->take(10)->get();

        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function newest()
    {
        $movies = Movie::orderBy('release_date', 'desc')->take(10)->get();

        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function onlymovie()
    {
        $exception = Movie::leftJoin('movie_genres', 'movie_genres.movie_id', 'movies.id')
            ->groupBy('movies.id')
            ->where('movie_genres.genre_id', 4)
            ->orWhere('istvshow', 1)
            ->pluck('movies.id')->toArray();

        $movies = Movie::whereNotIn('id', $exception)->orderBy('rated','desc')->get();

        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function tvshow()
    {
        $shows = Movie::where('istvshow', 1)->get();

        return response()->json([
            'success' => true,
            'movies' => $shows
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->key;
        $movies = Movie::where('title', 'like', '%' . $search . '%')->get();

        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }

    public function comment(Request $request, $movie)
    {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->movie_id = $movie;
        $comment->body = $request->body;

        $comment->save();

        $user_name = User::where('id', $request->user_id)->pluck('name')[0];

        $comment->user_name = $user_name;
        $arr = [];
        array_push($arr, $comment);
        return response()->json([
            'success' => true,
            'comments' => $arr
        ]);
    }

    public function getcomment($movie)
    {
        $comments = Comment::join('users', 'users.id', 'comments.user_id')
            ->where('movie_id', $movie)
            ->select('users.name AS user_name', 'comments.*')
            ->get();

        return response()->json([
            'success' => true,
            'comments' => $comments
        ]);
    }
}
