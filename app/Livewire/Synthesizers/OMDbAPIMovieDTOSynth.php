<?php

namespace App\Livewire\Synthesizers;

use App\DTOs\OMDbAPIMovieDTO;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class OMDbAPIMovieDTOSynth extends Synth
{
    public static $key = 'omdbapimoviedto';

    public static function match($target): bool
    {
        return $target instanceof OMDbAPIMovieDTO;
    }

    public function dehydrate(OMDbAPIMovieDTO $target): array
    {
        return [$target->toArray(), []];
    }

    public function hydrate($value): OMDbAPIMovieDTO
    {
        return OMDbAPIMovieDTO::fromArray($value);
    }
}
