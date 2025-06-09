<?php

namespace App\Livewire\Pages\Movies;

use App\DTOs\MovieAPIMovieDTO;
use App\Exceptions\MovieAPIException;
use App\Facades\MovieAPI;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.public')]
class Show extends Component
{
    public string $imdb_id;

    #[Computed]
    public function movie(): MovieAPIMovieDTO
    {
        try {
            return MovieAPI::findByIMDbId($this->imdb_id);
        } catch (MovieAPIException $e) {
            abort(404, $e->getMessage());
        }
    }


    public function render(): View
    {
        return view('livewire.pages.movies.show');
    }
}
