<?php

namespace App\Models;

use App\DTOs\MovieAPIMovieDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    protected $fillable = [
        'imdb_id',
        'title',
        'poster_url',
        'plot'
    ];

    public function ratings(): HasMany
    {
        return $this->hasMany(MovieRating::class);
    }

    public static function makeFromMovieAPIMovieDTO(MovieAPIMovieDTO $movieDTO): Movie
    {
        return Movie::make($movieDTO->toArray());
    }
}
