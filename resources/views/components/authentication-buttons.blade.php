<div class="flex gap-2">
    <flux:button icon="magnifying-glass" wire:navigate href="{{ route('index') }}"/>

    @if(auth()->check())
        <flux:button icon="home" wire:navigate href="{{ route('dashboard') }}"/>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <flux:button icon="arrow-right-start-on-rectangle" class="cursor-pointer" type="submit">
            </flux:button>
        </form>
    @else
        <flux:button icon="arrow-right-end-on-rectangle" wire:navigate href="{{ route('login') }}"/>
        <flux:button icon="user-plus" wire:navigate href="{{ route('registration') }}"/>
    @endif
</div>
