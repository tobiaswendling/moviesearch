<?php

namespace App\DTOs;

class OMDbAPIMovieDTO extends MovieAPIMovieDTO
{
    public static function fromOMDbAPIResponseData(array $data): self
    {
        return new self(
            imdb_id: $data['imdbID'],
            title: $data['Title'],
            poster_url: $data['Poster'] === 'N/A' ? null : $data['Poster'],
            plot: $data['Plot'] ?? null,
        );
    }

    public static function fromArray(array $data): MovieAPIMovieDTO
    {
        return new self(
            imdb_id: $data['imdb_id'],
            title: $data['title'],
            poster_url: $data['poster_url'],
            plot: $data['plot'],
        );
    }
}
