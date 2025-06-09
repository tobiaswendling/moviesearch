<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Pages\Index::class)->name('index');
Route::get('/movie/{imdb_id}', \App\Livewire\Pages\Movies\Show::class)->name('movies.show');

Route::get('/dashboard', \App\Livewire\Pages\Administration\Dashboard::class)
    ->middleware('auth')
    ->name('dashboard');

require __DIR__.'/authentication.php';
