<div
    x-data="{
        loading: true,
        error: false
    }"
    class="aspect-[300/445] max-w-[300px] rounded-md overflow-hidden bg-gray-100 flex items-center justify-center"
>
    @if ($poster_url)
        <template x-if="loading && !error">
            <flux:icon.loading class="text-gray-400 animate-spin"/>
        </template>

        <img
            src="{{ $poster_url }}"
            alt="{{ $title }}"
            class="h-full w-full object-cover"
            @load="loading = false"
            x-on:error="loading = false; error = true"
            x-show="!loading && !error"
        />

        <template x-if="error">
            <flux:icon.film class="size-[31.8%] text-gray-400"/>
        </template>
    @else
        <flux:icon.film class="size-[31.8%] text-gray-400"/>
    @endif
</div>
