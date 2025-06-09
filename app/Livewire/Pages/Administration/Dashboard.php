<?php

namespace App\Livewire\Pages\Administration;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('components.layouts.basic')]
class Dashboard extends Component
{
    public function render(): View
    {
        return view('livewire.pages.administration.dashboard')
            ->title(__('Dashboard'));
    }
}
