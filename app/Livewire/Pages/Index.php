<?php

namespace App\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.public')]
class Index extends Component
{
    public function render(): View
    {
        return view('livewire.pages.index');
    }
}
