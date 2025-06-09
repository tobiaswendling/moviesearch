<div class="flex flex-col gap-4">
    <h1 class="font-bold text-2xl">
        {{ __('Your rated movies') }}
    </h1>
    <livewire:components.movies-grid wire:key="{{ $movies->currentPage() }}" :movies="$movies->items()" />
    {{ $movies->links() }}
</div>
