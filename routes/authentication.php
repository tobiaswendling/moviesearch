<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/registration', \App\Livewire\Pages\Authentication\Registration::class)
        ->name('registration');

    Route::get('/login', \App\Livewire\Pages\Authentication\Login::class)
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', \App\Actions\Authentication\LogoutAction::class)
        ->name('logout');
});
