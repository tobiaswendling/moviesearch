<div>
    <form wire:submit="login" class="flex flex-col gap-6">
        <flux:input
            wire:model="form.email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <flux:input
            wire:model="form.password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <flux:checkbox
            wire:model="form.remember"
            :label="__('Remember me')" />

        <flux:button type="submit" variant="primary" class="w-full">
            {{ __('Log in') }}
        </flux:button>
    </form>
</div>
