<?php

namespace App\Livewire\Pages\Administration;

use App\Models\Movie;
use App\Models\MovieRating;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.basic')]
class Dashboard extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('livewire.pages.administration.dashboard', [
            'movies' => Movie::query()
                ->withWhereHas('ratings', fn ($query) => $query->where('user_id', auth()->id()))
                ->paginate(10),
        ])
            ->title(__('Dashboard'));
    }
}
