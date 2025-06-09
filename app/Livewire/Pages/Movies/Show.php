<?php

namespace App\Livewire\Pages\Movies;

use App\Exceptions\MovieAPIException;
use App\Facades\MovieAPI;
use App\Models\Movie;
use App\Models\MovieRating;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('components.layouts.public')]
class Show extends Component
{
    public string $imdb_id;

    #[On('movie-rated')]
    public function movieRated(int $rating): void
    {
        if(!$this->movie->current_user_rating) {
            if(!$this->movie->id) {
                $this->movie->save();
            }

            $this->movie->ratings()->create(['user_id' => auth()->id(), 'rating' => $rating]);
            unset($this->movie);
        }
    }

    #[Computed]
    public function movie(): Movie
    {
        if(!($movie = Movie::query()
            ->where('imdb_id', $this->imdb_id)
            ->addSelect([
                'current_user_rating' => MovieRating::select('rating')
                    ->where('user_id', auth()->id())
                    ->whereColumn('movie_id', 'movies.id')
                    ->limit(1)
            ])
            ->withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->first())) {
            try {
                $movie = Movie::makeFromMovieAPIMovieDTO(MovieAPI::findByIMDbId($this->imdb_id));
            } catch (MovieAPIException $e) {
                abort(404, $e->getMessage());
            }
        }

        return $movie;
    }

    public function render(): View
    {
        return view('livewire.pages.movies.show');
    }
}
