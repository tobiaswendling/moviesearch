<div class="flex flex-col gap-4">
    <div class="flex flex-col gap-2">
        <flux:input autocomplete="off" wire:model.live.debounce.300ms="search"/>
        @error('search') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    @if ($search)
        <div class="flex flex-col gap-4">
            <p class="text-sm">
                {{ __(':count movies found for ":search"', ['count' => $total, 'search' => $search ]) }}
            </p>
            <div wire:loading.class="opacity-50 pointer-events-none" class="transition-opacity">
                <livewire:components.movies-grid :movies="$results"/>
            </div>
        </div>
    @else
        <div>
            <!-- TODO: Add placeholder content. (Recently rated movies, ...) -->
        </div>
    @endif
</div>
