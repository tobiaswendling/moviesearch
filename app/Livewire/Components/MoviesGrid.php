<?php

namespace App\Livewire\Components;

use App\DTOs\MovieAPIMovieDTO;
use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;

class MoviesGrid extends Component
{
    public mixed $movies = [];

    public function render(): View
    {
        return view('livewire.components.movies-grid');
    }
}
