<?php

namespace App\Contracts;

use App\DTOs\MovieAPIMovieDTO;
use App\DTOs\MovieAPISearchResultDTO;
use App\Exceptions\MovieAPIException;

interface MovieAPIService
{
    /** @throws MovieAPIException */
    public function searchByTitle(string $title, ?array $options = []): MovieAPISearchResultDTO;
    /** @throws MovieAPIException */
    public function findByTitle(string $title, ?array $options = []): MovieAPIMovieDTO;
    /** @throws MovieAPIException */
    public function findByIMDbId(string $imdb_id, ?array $options = []): MovieAPIMovieDTO;
}
