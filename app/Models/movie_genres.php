<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie_genres extends Model
{
    use HasFactory;

    protected $fillable =[
        'movie_id',
        'genre_id'
    ];
}
