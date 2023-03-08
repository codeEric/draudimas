@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed top-20 left-1/2 bg-green-500 text-white py-2 px-4 rounded-xl text-sm"
        style="transform: translateX(-50%)">
        <p>{{ session('success') }}</p>
    </div>
@endif
