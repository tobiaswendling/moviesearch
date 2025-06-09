<?php

namespace App\DTOs;

class OMDbAPISearchResultDTO extends MovieAPISearchResultDTO
{
    public static function fromOMDbAPIResponseData(array $data): self
    {
        $results = collect($data['Search'])
            ->map(fn (array $movie) => OMDbAPIMovieDTO::fromOMDbAPIResponseData($movie))
            ->toArray();

        return new self(
            total: $data['totalResults'],
            results: $results,
        );
    }
}
