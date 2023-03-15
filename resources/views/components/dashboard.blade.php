@props(['heading'])
<section class="py-8 max-w-6xl mx-auto relative">
    <h1 class="text-xl font-bold mb-4 pb-2 border-b">{{ __(ucfirst($heading)) }}</h1>
    <div class="flex">
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</section>
