<?php

namespace App\DTOs;

abstract class MovieAPIMovieDTO
{
    public function __construct(
        public string $imdb_id,
        public string $title,
        public ?string $poster_url = null,
    ) {}

    public function toArray(): array
    {
        return [
            'imdb_id' => $this->imdb_id,
            'title' => $this->title,
            'poster_url' => $this->poster_url,
        ];
    }

    abstract public static function fromArray(array $data): self;
}
