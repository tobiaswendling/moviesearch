<?php

namespace App\Actions\Authentication;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegistrationAction
{
    public function register(array $data): void
    {
        event(new Registered(($user = User::create($data))));

        Auth::login($user);
        Session::regenerate();
    }
}
