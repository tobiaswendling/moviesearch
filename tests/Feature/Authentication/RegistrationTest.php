<?php

use App\Livewire\Pages\Authentication\Registration;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders the registration page', function () {
    $this->get(route('registration'))
        ->assertStatus(200)
        ->assertSeeLivewire(Registration::class);
});

it('registers a user with valid credentials', function () {
    $data = [
        'form.username' => 'testuser',
        'form.email' => 'test@example.com',
        'form.password' => 'password',
        'form.password_confirmation' => 'password',
    ];

    Livewire::test(Registration::class)
        ->set($data)
        ->call('register')
        ->assertRedirect(route('index'));

    $this->assertTrue(Auth::check());
    $this->assertEquals($data['form.username'], Auth::user()->username);
});

it('does not register a user with invalid credentials', function () {
    $data = [
        'form.username' => 'test user @123',
        'form.email' => 'thisisnotanemail',
        'form.password' => 'password',
        'form.password_confirmation' => 'password_1',
    ];

    Livewire::test(Registration::class)
        ->set($data)
        ->call('register')
        ->assertHasErrors(['form.username', 'form.email', 'form.password']);

    $data = [
        'form.username' => 'testuser',
        'form.email' => 'test@example.com',
        'form.password' => 'password',
        'form.password_confirmation' => 'password',
    ];

    $user = \App\Models\User::factory()->create(['username' => $data['form.username']]);

    Livewire::test(Registration::class)
        ->set($data)
        ->call('register')
        ->assertHasErrors(['form.username']);

    $user = \App\Models\User::factory()->create(['email' => $data['form.email']]);

    $data['form.username'] = 'testuser1';

    Livewire::test(Registration::class)
        ->set($data)
        ->call('register')
        ->assertHasErrors(['form.email']);

    $this->assertFalse(Auth::check());
});
