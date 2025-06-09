<?php

namespace App\Livewire\Pages\Movies;

use App\Models\Movie;
use App\Models\MovieRating;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.basic')]
class Index extends Component
{
    public function render(): View
    {
        return view('livewire.pages.movies.index', [
            'movies' => Movie::query()
                ->withWhereHas('ratings')
                ->orderByDesc(
                    MovieRating::select('created_at')
                        ->whereColumn('movie_id', 'movies.id')
                        ->latest()
                        ->limit(1)
                )
                ->paginate(10),
        ])->title(__('Rated movies'));
    }
}
