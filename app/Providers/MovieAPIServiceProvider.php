<?php

namespace App\Providers;

use App\Contracts\MovieAPIService;
use App\Livewire\Synthesizers\OMDbAPIMovieDTOSynth;
use App\Services\OMDbAPIService;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class MovieAPIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MovieAPIService::class, OMDbAPIService::class);
        $this->app->singleton('movieAPI', fn ($app) => $app->make(MovieAPIService::class));
    }

    public function boot(): void
    {
        Livewire::propertySynthesizer(OMDbAPIMovieDTOSynth::class);
    }
}
