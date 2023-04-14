<x-layout>
    <x-dashboard heading="Add new owner">
        <form method="POST" action="/dashboard/owners">
            @csrf

            <x-form.input name="name" />
            <x-form.input name="surname" />

            <x-form.submit>{{ __('Add') }}</x-form.submit>
        </form>
    </x-dashboard>
</x-layout>
