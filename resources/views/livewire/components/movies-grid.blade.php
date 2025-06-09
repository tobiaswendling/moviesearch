<div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5"
     x-data="{ loading_movie_imdb: null }">
    @foreach ($movies as $movie)
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
