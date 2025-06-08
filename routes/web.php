<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Pages\Index::class)->name('index');
