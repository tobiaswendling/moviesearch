<?php

namespace App\Livewire\Pages\Authentication;

use App\Actions\Authentication\LoginAction;
use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.authentication')]
class Login extends Component
{
    public LoginForm $form;

    public function login(LoginAction $action): void
    {
        $action->login($this->validate());

        $this->redirectIntended(route('index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.authentication.login')
            ->title(__('Log in'));
    }
}
