<div class="aspect-[300/445] max-w-[300px] rounded-md overflow-hidden bg-gray-100 flex items-center justify-center">
    @if($poster_url)
        <img src="{{ $poster_url }}" alt="{{ $title }}" class="h-full w-full object-cover"/>
    @else
        <flux:icon.film class="size-[31.8%] text-gray-400"/>
    @endif
</div>
