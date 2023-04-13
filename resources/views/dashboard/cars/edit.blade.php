<x-layout>
    <x-dashboard :heading="__('Edit car') . ': ' . $car->reg_number">
        <form method="POST" action="/dashboard/cars/{{ $car->id }}" enctype="multipart/form-data">
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
            <x-form.field>
                <div class="flex flex-col w-full space-x-8">
                    @foreach ($car->carImage as $image)
                        <div>
                            <img src="{{ asset('/storage/cars/' . $image->image) }}" />
                        </div>
                    @endforeach
                </div>
            </x-form.field>
            <x-form.field>
                <x-form.file-upload name="image"></x-form.file-upload>
            </x-form.field>
            <x-form.submit>Save</x-form.submit>
        </form>
    </x-dashboard>
</x-layout>
