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
            <div wire:loading.class="opacity-50 pointer-events-none" class="transition-opacity grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5"
                 x-data="{ loading_movie_imdb: null }">
                @foreach ($results as $movie)
                    <a wire:navigate
                       :data-loading="loading_movie_imdb !== null"
                       x-on:click="loading_movie_imdb = '{{ $movie->imdb_id }}'"
                       href="{{ route('movies.show', ['imdb_id' => $movie->imdb_id]) }}"
                       class="flex flex-col gap-2 relative rounded-md overflow-hidden data-[loading=true]:pointer-events-none">
                        <livewire:components.movie-poster :wire:key="$movie->imdb_id" :poster_url="$movie->poster_url" :title="$movie->title"/>
                        <div
                            x-show="loading_movie_imdb === '{{ $movie->imdb_id }}'"
                            x-transition.opacity
                            class="absolute inset-0 flex items-center justify-center bg-black/50 text-white">
                            <flux:icon.loading class="size-6"/>
                        </div>
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
