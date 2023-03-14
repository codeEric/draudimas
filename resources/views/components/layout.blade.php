<!doctype html>

<title>Insurance</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif" class="h-screen">
    <nav class="bg-gray-800">
        <div class="px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-shrink-0 items-center">
                    <a class="text-white font-bold text-2xl" href="/">Insurance</a>
                </div>
                <div class="flex flex-1 items-center justify-center">
                    <div>
                        <div class="flex space-x-4">
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            <x-nav-link href="/dashboard/cars" :active="request()->is('dashboard/cars') || request()->is('dashboard/cars/*')">Cars</x-nav-link>
                            <x-nav-link href="/dashboard/owners" :active="request()->is('dashboard/owners') || request()->is('dashboard/owners/*')">Owners</x-nav-link>
                        </div>
                    </div>
                </div>
                @guest
                    <div class="flex space-x-4">
                        <a class="text-blue-500 hover:text-blue-600" href="/login">Login</a>
                        <a class="text-blue-500 hover:text-blue-600" href="/register">Register</a>
                    </div>
                @endguest
                @auth
                    <div>
                        <form id="logout-form" method="POST" action="/logout">
                            @csrf
                            <button class="text-red-500 hover:text-red-700">Log out</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    {{ $slot }}
    <x-flash-message />
</body>
