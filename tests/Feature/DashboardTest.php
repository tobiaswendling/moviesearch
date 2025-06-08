<?php

use App\Livewire\Pages\Administration\Dashboard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('redirects unauthenticated users to the login page', function () {
    $this->get(route('dashboard'))
        ->assertRedirect(route('login'));
});

it('renders the dashboard page for authenticated users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertStatus(200)
        ->assertSeeLivewire(Dashboard::class);
});
