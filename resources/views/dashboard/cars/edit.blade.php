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
                <x-form.file-upload name="images"></x-form.file-upload>
            </x-form.field>
            <x-form.submit>{{ __('Save') }}</x-form.submit>
        </form>

        <div class="mt-8">
            <h1 class="font-bold text-xl">{{ __('Uploaded images') . ':' }}</h1>
            @if ($car->carImage->isEmpty())
                <h2>{{ __('No images has been uploaded yet') }}</h2>
            @else
                <div class="grid grid-cols-3 w-full space-y-4 mt-4">
                    @foreach ($car->carImage as $image)
                        <div class="relative">
                            <img class="h-full w-75" src="{{ asset('/storage/cars/' . $image->image) }}" />
                            <form method="POST" action="/dashboard/image/{{ $image->id }}"
                                class="absolute bottom-1 left-1">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="text-xs font-bold text-black bg-red-400 rounded-lg w-16 h-8 mt-2">{{ __('Delete') }}</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-dashboard>
</x-layout>
