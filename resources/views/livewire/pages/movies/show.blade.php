<div class="flex flex-col gap-6 max-w-sm mx-auto">
    <div class="bg-black/10 rounded-lg inset-shadow-sm flex items-center justify-center aspect-[300/445]">
        <livewire:components.movie-poster
            :poster_url="$this->movie->poster_url"
            :title="$this->movie->title"
        />
    </div>

    <div class="px-8 flex flex-col gap-2">
        <h1 class="text-center font-bold text-xl">{{ $this->movie->title }}</h1>

        @if($this->movie->ratings_count && $this->movie->ratings_avg_rating)
            <div class="flex flex-col gap-1">
                <div class="mx-auto flex items-center text-gray-500">
                    @for($i = 0; $i < 5; $i++)
                        <flux:icon.star class="fill-current size-4 data-[active=true]:text-yellow-500"
                                        data-active="{{ $i < $this->movie->ratings_avg_rating ? 'true' : 'false' }}"/>
                    @endfor
                </div>
                <span class="mx-auto text-xs opacity-50">{{ __(':avg_rating with :ratings_count votes', [
                    'avg_rating' => $this->movie->ratings_avg_rating,
                    'ratings_count' => $this->movie->ratings_count
                ]) }}
                </span>
            </div>
        @else
            <div class="flex flex-col gap-1 opacity-50">
                <div class="mx-auto flex items-center text-gray-500">
                    @for($i = 0; $i < 5; $i++)
                        <flux:icon.star class="fill-current size-4"/>
                    @endfor
                </div>
                <span class="mx-auto text-xs">{{ __('No ratings yet') }}</span>
            </div>
        @endif
    </div>

    <div>
        @if(!auth()->check())
            <flux:button variant="primary" icon="star" class="w-full" href="{{route('login')}}">
                {{ __('Log in to rate this movie') }}
            </flux:button>
        @else
            <div class="bg-black/5 p-4 rounded-md text-center flex flex-col gap-2">

            @if($this->movie->current_user_rating)
                    <p class="text-xs">{{ __('You rated this movie')  }}</p>
                    <div class="mx-auto flex items-center text-gray-500">
                        @for($i = 0; $i < 5; $i++)
                            <flux:icon.star class="fill-current size-6 data-[active=true]:text-yellow-500"
                                            data-active="{{ $i < $this->movie->current_user_rating ? 'true' : 'false' }}"/>
                        @endfor
                    </div>
                    <p class="text-xs">{{ __(':count of 5 stars', ['count' => $this->movie->current_user_rating])  }}</p>
            @else

                    <p class="text-xs">{{ __('Rate this movie')  }}</p>
                    <div class="mx-auto">
                        <livewire:components.movie-rating/>
                    </div>
            @endif
            </div>

        @endif
    </div>

    <div class="max-w-screen-lg mx-auto gap-8 flex flex-col">
        <div class="hidden grid gap-8 lg:grid-cols-[250px_1fr] p-8 bg-gray-100 dark:bg-gray-800 rounded-md">
            <div class="shrink-0 max-w-[300px]">
                <livewire:components.movie-poster
                    :poster_url="$this->movie->poster_url"
                    :title="$this->movie->title"
                />
            </div>
            <div class="flex-1 flex flex-col gap-4">
                <span
                    class="text-xs bg-gray-200 dark:bg-gray-700 w-fit rounded-md inline-flex p-1">{{ $this->movie->imdb_id }}</span>
                <h1 class="text-3xl font-semibold">{{ $this->movie->title }}</h1>
                <p class="leading-relaxed">{{ $this->movie->plot }}</p>
            </div>
        </div>
        <div class="hidden rounded-md flex flex-col gap-4">
            @if($this->movie->ratings_count && $this->movie->ratings_avg_rating)
                <div class="flex items-center gap-2 text-gray-500">
                    <flux:icon.star/>
                    {{ $this->movie->ratings_avg_rating }}
                </div>
            @else
                <div>
                    {{ __('No ratings yet.') }}
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
</div>
