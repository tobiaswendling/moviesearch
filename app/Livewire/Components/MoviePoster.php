<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class MoviePoster extends Component
{
    public ?string $poster_url = null;
    public string $title;

    public function render(): View
    {
        return view('livewire.components.movie-poster');
    }
}
