<?php

namespace App\Actions\Authentication;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutAction
{
    public function __invoke(): RedirectResponse
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();

        return to_route('login');
    }
}
