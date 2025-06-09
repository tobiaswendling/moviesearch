<?php

namespace App\DTOs;

abstract class MovieAPISearchResultDTO
{
    public function __construct(
        public int $total,
        /** @var MovieAPIMovieDTO[] */
        public array $results
    ) {}
}
