<div>
    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="form.username"
            :label="__('Username')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Username')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="form.email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="form.password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="form.password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
            viewable
        />

        <flux:button type="submit" variant="primary" class="w-full">
            {{ __('Create account') }}
        </flux:button>
    </form>
</div>
