<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'poster',
        'description',
        'fileUrl',
        'rated',
        'popular',
        'release_date',
        'age_restricted'
    ];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
}
