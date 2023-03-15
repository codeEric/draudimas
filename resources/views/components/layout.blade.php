<!doctype html>

<title>Insurance</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css"
    integrity="sha512-uvXdJud8WaOlQFjlz9B15Yy2Au/bMAvz79F7Xa6OakCl2jvQPdHD0hb3dEqZRdSwG4/sknePXlE7GiarwA/9Wg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif" class="h-screen">
    <nav class="bg-gray-800">
        <div class="px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-shrink-0 items-center">
                    <a class="text-white font-bold text-2xl" href="/">{{ __('Insurance') }}</a>
                </div>
                <div class="flex flex-1 items-center justify-center">
                    <div>
                        <div class="flex space-x-4">
                            <x-nav-link href="/" :active="request()->is('/')">{{ __('Home') }}</x-nav-link>
                            <x-nav-link href="/dashboard/cars" :active="request()->is('dashboard/cars') || request()->is('dashboard/cars/*')">{{ __('Cars') }}</x-nav-link>
                            <x-nav-link href="/dashboard/owners" :active="request()->is('dashboard/owners') || request()->is('dashboard/owners/*')">{{ __('Owners') }}</x-nav-link>
                        </div>
                    </div>
                </div>
                @guest
                    <div class="flex space-x-4">
                        <a class="text-blue-500 hover:text-blue-600" href="/login">{{ __('Login') }}</a>
                        <a class="text-blue-500 hover:text-blue-600" href="/register">{{ __('Register') }}</a>
                    </div>
                @endguest
                @auth
                    <div>
                        <form id="logout-form" method="POST" action="/logout">
                            @csrf
                            <button class="text-red-500 hover:text-red-700">{{ __('Log out') }}</button>
                        </form>
                    </div>
                @endauth
                <div class="flex ml-8 space-x-4">
                    <div>
                        <a href="{{ '/setLanguage/en' }}"><span class="fi fi-us"></span></a>
                    </div>
                    <div>
                        <a href="{{ '/setLanguage/kr' }}"><span class="fi fi-kr"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{ $slot }}
    <x-flash-message />
</body>
