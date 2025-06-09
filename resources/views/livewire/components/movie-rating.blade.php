<div class="flex flex-col gap-4">
    <div class="flex bg-white p-4 rounded-md w-fit" x-data="{ rating: @entangle('rating') }">
        @for($i = 0; $i < 5; $i++)
            <button wire:click="rate"
                    x-on:mouseenter="rating = {{ $i + 1 }}"
                    x-on:mouseleave="rating = 0"
                    class="text-gray-400 cursor-pointer"
                    x-bind:class="{ 'text-yellow-500': rating >= {{ $i + 1 }} }">
                <flux:icon.star class="size-8 fill-current"/>
            </button>
        @endfor
    </div>
</div>
