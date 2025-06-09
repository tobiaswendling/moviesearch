<x-layouts.app>
    <header class="py-4">
        <div class="container flex justify-end gap-2">
            <x-authentication-buttons/>
        </div>
    </header>
    <main>{{ $slot }}</main>
    <footer></footer>
</x-layouts.app>
