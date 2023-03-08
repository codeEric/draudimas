@props(['name', 'labelName' => null, 'value' => null])

<x-form.field>
    <x-form.label name="{{ $labelName ?? $name }}" />

    <input class="border border-gray-200 p-2 w-full rounded" name="{{ $name }}" id="{{ $name }}"
        {{ $attributes(['value' => $value ?? old($name)]) }}>

    <x-form.error name="{{ $name }}" />
</x-form.field>
