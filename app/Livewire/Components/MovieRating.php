<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class MovieRating extends Component
{
    public int $rating = 0;

    public function rate(): void
    {
        $this->dispatch('movie-rated', $this->rating);
    }

    public function render(): View
    {
        return view('livewire.components.movie-rating');
    }
}
