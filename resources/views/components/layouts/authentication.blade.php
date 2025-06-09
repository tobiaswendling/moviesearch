<x-layouts.app :title="$title">
    <div class="h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            {{ $slot }}
        </div>
    </div>
</x-layouts.app>
