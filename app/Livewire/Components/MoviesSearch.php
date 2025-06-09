<?php

namespace App\Livewire\Components;

use App\DTOs\MovieAPIMovieDTO;
use App\Exceptions\MovieAPIException;
use App\Facades\MovieAPI;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class MoviesSearch extends Component
{
    #[Url(except: '')]
    public string $search = '';

    public int $total = 0;
    /** @var MovieAPIMovieDTO[]  */
    public array $results = [];

    protected function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'min:3'],
        ];
    }

    public function updatedSearch(): void
    {
        $this->searchMovies();
    }

    public function mount(): void
    {
        $this->searchMovies();
    }

    public function render(): View
    {
        return view('livewire.components.movies-search');
    }

    private function searchMovies(): void
    {
        $this->reset('total', 'results');
        $this->validate();

        if (empty($this->search)) return;

        try {
            $search_result = MovieAPI::searchByTitle($this->search, ['type' => 'movie']);
        } catch (MovieAPIException $e) {
            throw ValidationException::withMessages(['search' => $e->getMessage()]);
        }

        $this->total = $search_result->total;
        $this->results = $search_result->results;
    }
}
