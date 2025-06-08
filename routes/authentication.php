<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/registration', \App\Livewire\Pages\Authentication\Registration::class)
        ->name('registration');
});
