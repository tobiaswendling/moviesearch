<?php

namespace App\DTOs;

abstract class MovieAPIMovieDTO
{
    public function __construct(
        public string $imdb_id,
        public string $title,
        public ?string $poster_url = null,
    ) {}
}
