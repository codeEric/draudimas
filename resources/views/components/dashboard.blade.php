@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-xl font-bold mb-8 pb-2 border-b">{{ $heading }}</h1>

    <div class="flex">
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</section>
