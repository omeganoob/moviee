<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/v1')->group(function () {
    Route::post('/login',[AuthController::class, 'login'] );
    Route::post('/register',[AuthController::class, 'register'] );
    Route::get('/user/{user_id}/favorite', [MovieController::class, 'favorite']);
    Route::get('/genre/list', [MovieController::class, 'getGenre']);
    
    Route::post('/addtofav',[MovieController::class, 'addToFav']);
    Route::get('/isfav',[MovieController::class, 'isfav']);

    Route::prefix('/movie')->group(function () {
        Route::get('/', [MovieController::class, 'all']);
        Route::get('/all', [MovieController::class, 'index']);
        Route::get('/{id}', [MovieController::class, 'detail']);
        Route::get('/bygenre/', [MovieController::class, 'genre']);
        Route::get('/age/{age}', [MovieController::class, 'age']);
        Route::get('/toprated', [MovieController::class, 'toprated']);
        Route::get('/popular', [MovieController::class, 'popular']);
        Route::get('/newest', [MovieController::class, 'newest']);
        Route::get('/onlymovie', [MovieController::class, 'onlymovie']);
        Route::get('/search', [MovieController::class, 'search']);
        Route::get('/{movie}/get/comment', [MovieController::class, 'getcomment']);
        Route::post('/{movie}/comment', [MovieController::class, 'comment']);
    });

    Route::get('/tv/all', [MovieController::class, 'tvshow']);
});




