<x-layout>
    <x-dashboard :heading="'Edit car: ' . $car->reg_number">
        <form method="POST" action="/dashboard/cars/{{ $car->id }}">
            @csrf
            @method('PATCH')
            <x-form.input name="brand" :value="old('brand', $car->brand)" />
            <x-form.input name="model" :value="old('model', $car->model)" />
            <x-form.input name="reg_number" labelName="Registration number" :value="old('reg_number', $car->reg_number)" />
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

            <x-form.submit>Save</x-form.submit>
        </form>
    </x-dashboard>
</x-layout>
