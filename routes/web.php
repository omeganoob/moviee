<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home')->middleware('auth')->name('home');

Route::middleware('auth')->group(function(){
    
    Route::prefix('/movie')->group(function () {
        Route::get('/', [MovieController::class, 'index'])->name('movie.all');
        Route::get('/create', [MovieController::class, 'create'])->name('movie.create');

        Route::post('/', [MovieController::class, 'store'])->name('movie.store');
    });

    Route::prefix('/genres')->group(function(){
        Route::get('/', [GenreController::class, 'index'])->name('genre.all');
        Route::get('/create', [GenreController::class, 'create'])->name('genre.create');
        
        Route::post('/', [GenreController::class, 'store'])->name('genre.store');
    });
    
});
