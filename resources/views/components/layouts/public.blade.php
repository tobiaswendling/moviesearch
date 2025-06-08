<x-layouts.app>
    <header class="py-4">
        <div class="container flex justify-end gap-2">
            @if(auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:button type="submit">
                        {{ __('Log Out') }}
                    </flux:button>
                </form>
            @else
                <flux:button wire:navigate href="{{ route('login') }}">{{__('Log in')}}</flux:button>
                <flux:button wire:navigate href="{{ route('registration') }}">{{__('Register')}}</flux:button>
            @endif
        </div>
    </header>
    <main>{{ $slot }}</main>
    <footer></footer>
</x-layouts.app>
