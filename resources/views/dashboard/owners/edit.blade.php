<x-layout>
    <x-dashboard heading="Edit owner">
        <form method="POST" action="/dashboard/owners/{{ $owner->id }}">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $owner->name)" />
            <x-form.input name="surname" :value="old('surname', $owner->surname)" />

            <x-form.submit>{{ __('Save') }}</x-form.submit>
        </form>
    </x-dashboard>
</x-layout>
