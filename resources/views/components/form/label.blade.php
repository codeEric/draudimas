@props(['name', 'labelName' => null])
<label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-6" for="{{ $name }}">
    {{ ucwords($labelName ?? $name) }}
</label>
