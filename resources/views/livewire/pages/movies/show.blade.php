<div class="max-w-screen-lg mx-auto gap-8 flex flex-col">
    <div class="grid gap-8 lg:grid-cols-[250px_1fr] p-8 bg-gray-100 rounded-md">
        <div class="shrink-0 max-w-[300px]">
            <livewire:components.movie-poster
                :poster_url="$this->movie->poster_url"
                :title="$this->movie->title"
            />
        </div>
        <div class="flex-1 flex flex-col gap-4">
            <span class="text-xs bg-gray-200 w-fit rounded-md inline-flex p-1">{{ $this->movie->imdb_id }}</span>
            <h1 class="text-3xl font-semibold">{{ $this->movie->title }}</h1>
            <p class="leading-relaxed">{{ $this->movie->plot }}</p>
        </div>
    </div>
    <div class="p-8 bg-gray-100 rounded-md flex flex-col gap-4">
        @if($this->movie->ratings_count && $this->movie->ratings_avg_rating)
            <div class="flex items-center gap-2 text-gray-500">
                <flux:icon.star/>
                {{ $this->movie->ratings_avg_rating }}
            </div>
        @endif

        <div>
            @if(!auth()->check())
                <div>
                    {{ __('Please log in to rate this movie.') }}
                </div>
            @else
                @if($this->movie->current_user_rating)
                    <div>{{ __('You rated this movie with :rating stars', ['rating' => $this->movie->current_user_rating])  }}</div>
                @else
                    <livewire:components.movie-rating/>
                @endif
            @endif
        </div>
    </div>
</div>
