<x-layouts.app :title="$title">
    <header class="py-4">
        <div class="container flex justify-between items-center gap-2">
            <div></div>
            <x-authentication-buttons/>
        </div>
    </header>
    <main>
        <div class="container">
            {{ $slot }}
        </div>
    </main>
    <footer></footer>
</x-layouts.app>
