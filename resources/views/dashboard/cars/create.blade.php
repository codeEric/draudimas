<x-layout>
    <x-dashboard heading="Add new car">
        <form method="POST" action="/dashboard/cars" enctype="multipart/form-data">
            @csrf

            <x-form.input name="brand" />
            <x-form.input name="model" />
            <x-form.input name="reg_number" labelName="Registration number" />
            <x-form.field>
                <x-form.label name="owner" />

                <select name="owner_id" id="owner_id">
                    @foreach (\App\Models\Owner::all() as $owner)
                        <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>
                            {{ ucwords($owner->name) }} {{ ucwords($owner->surname) }}</option>
                    @endforeach
                </select>

                <x-form.error name="owner" />
            </x-form.field>
            <x-form.field>
                <x-form.file-upload name="images" />
            </x-form.field>
            <x-form.submit>{{ __('Add') }}</x-form.submit>
        </form>
    </x-dashboard>
</x-layout>
