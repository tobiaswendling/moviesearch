<?php

namespace App\Livewire\Pages\Authentication;

use App\Actions\Authentication\RegistrationAction;
use App\Livewire\Forms\RegistrationForm;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.authentication')]
class Registration extends Component
{
    public RegistrationForm $form;

    public function register(RegistrationAction $action): void
    {
        $action->register($this->validate());

        $this->redirectIntended(route('index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.pages.authentication.registration')
            ->title(__('Registration'));
    }
}
