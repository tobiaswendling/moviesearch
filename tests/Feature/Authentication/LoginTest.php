<?php

use App\Livewire\Pages\Authentication\Login;
use App\Livewire\Pages\Index;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

uses(RefreshDatabase::class);

it('renders the login page', function () {
    $this->get(route('login'))
        ->assertStatus(200)
        ->assertSeeLivewire(Login::class);
});

it('logs in a user with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    $data = [
        'form.email' => 'test@example.com',
        'form.password' => 'password',
        'form.remember' => false,
    ];

    Livewire::test(Login::class)
        ->set($data)
        ->call('login')
        ->assertRedirect(route('index'));

    $this->assertTrue(Auth::check());
    $this->assertEquals($user->id, Auth::id());
});

it('does not log in a user with invalid credentials', function () {
    User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Test with invalid email
    $data = [
        'form.email' => 'invalid@example.com',
        'form.password' => 'password',
        'form.remember' => false,
    ];

    Livewire::test(Login::class)
        ->set($data)
        ->call('login')
        ->assertHasErrors(['email']);

    $this->assertFalse(Auth::check());

    // Test with invalid password
    $data = [
        'form.email' => 'test@example.com',
        'form.password' => 'wrong_password',
        'form.remember' => false,
    ];

    Livewire::test(Login::class)
        ->set($data)
        ->call('login')
        ->assertHasErrors(['email']);

    $this->assertFalse(Auth::check());
});

it('logs out a user', function () {
    $user = User::factory()->create();

    Auth::login($user);
    $this->assertTrue(Auth::check());
    $this->assertEquals($user->id, Auth::id());

    $this->post(route('logout'));

    $this->assertFalse(Auth::check());
});
