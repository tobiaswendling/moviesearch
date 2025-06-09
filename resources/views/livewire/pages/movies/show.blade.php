<div class="flex flex-wrap gap-8">
    <livewire:components.movie-poster
        :poster_url="$this->movie->poster_url"
        :title="$this->movie->title"
    />
    <div>
        {{ $this->movie->title }}
    </div>
</div>
