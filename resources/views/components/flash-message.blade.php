@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed top-20 left-1/2 bg-green-500 text-white py-2 px-4 rounded-xl text-sm"
        style="transform: translateX(-50%)">
        <p>{{ __(session('success')) }}</p>
    </div>
@endif

@if (session()->has('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed top-20 left-1/2 bg-red-500 text-white py-2 px-4 rounded-xl text-sm"
        style="transform: translateX(-50%)">
        <p>{{ __(session('error')) }}</p>
    </div>
@endif
