<x-layout>
    <main class="max-w-lg mx-auto mt-20">
        <h1 class="text-2xl font-bold text-center mb-12">{{ __('Log in') }}</h1>
        <form action="/login" method="POST">
            @csrf
            <x-form.input name="email" type="email" autocomplete="username" />
            <x-form.input name="password" type="password" autocomplete="new-password" />
            <x-form.submit>{{ __('Log in') }}</x-form.submit>

        </form>

    </main>
</x-layout>
