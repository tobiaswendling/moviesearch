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
        );
    }
}
