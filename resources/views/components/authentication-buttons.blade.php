<div class="flex gap-2">
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
