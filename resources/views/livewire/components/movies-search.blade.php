<div class="flex flex-col gap-4">
    <div class="flex flex-col gap-2">
        <flux:input autocomplete="off" wire:model.live.debounce.300ms="search"/>
        @error('search') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    @if ($search)
        <div class="flex flex-col gap-4">
            <div>
                {{ __(':count movies found for ":search"', ['count' => $total, 'search' => $search ]) }}
            </div>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($results as $movie)
                    <a wire:navigate href="{{ route('movies.show', ['imdb_id' => $movie->imdb_id]) }}" class="flex flex-col gap-2">
                        <livewire:components.movie-poster :wire:key="$movie->imdb_id" :poster_url="$movie->poster_url" :title="$movie->title"/>
                    </a>
                @endforeach
            </div>
        </div>
    @else
        <div>
            <!-- TODO: Add placeholder content. (Recently rated movies, ...) -->
        </div>
    @endif
</div>
