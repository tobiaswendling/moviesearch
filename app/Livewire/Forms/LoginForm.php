<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate(['required', 'email'])]
    public string $email = '';

    #[Validate(['required', 'string'])]
    public string $password = '';

    #[Validate(['required', 'boolean'])]
    public bool $remember = false;
}
