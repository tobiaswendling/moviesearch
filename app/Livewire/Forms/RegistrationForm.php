<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegistrationForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:254', 'alpha_num:ascii', 'unique:users,username'])]
    public string $username = '';

    #[Validate(['required', 'email', 'min:3', 'max:254', 'unique:users,email'])]
    public string $email = '';

    #[Validate(['required', 'string', 'confirmed', 'min:8', 'max:254'])]
    public string $password = '';
    public string $password_confirmation = '';
}
