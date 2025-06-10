<?php

namespace App\Actions\Authentication;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginAction
{
    private string $throttle_key;

    public function login(array $data): void
    {
        $this->throttle_key = $this->getThrottleKey($data['email']);
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $data['remember'])) {
            RateLimiter::hit($this->throttle_key);

            throw ValidationException::withMessages([
                'form.email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttle_key);
        Session::regenerate();
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttle_key, 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttle_key);

        throw ValidationException::withMessages([
            'form.email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function getThrottleKey(string $email): string
    {
        return Str::transliterate(Str::lower($email).'|'.request()->ip());
    }
}
