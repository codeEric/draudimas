@props(['heading'])

<div class="mt-1 mb-8">
    <h1 class="text-m font-bold">{{ $heading }}</h1>
    {{ $slot }}
</div>
