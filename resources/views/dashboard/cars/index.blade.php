<x-layout>
    <x-dashboard heading="Manage cars">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6
            lg:px-8">
                    <x-search heading="Search for cars">
                        <form method="POST" action="/dashboard/cars/search">
                            @csrf
                            <x-form.input name="search-brand" labelName="Brand" value="{{ $filter->brand }}" />
                            <x-form.input name="search-model" labelName="Model" value="{{ $filter->model }}" />
                            <x-form.label name="search-reg_number" labelName="Registration number" />

                            <select name="search-reg_number" id="reg_number"
                                class="border border-gray-200 p-2 w-full rounded -bottom-3q">
                                <option value="">{{ __('No filter') }}</option>
                                @foreach ($allCars as $car)
                                    <option value="{{ $car->reg_number }}"
                                        {{ $filter->reg_number == $car->reg_number ? 'selected' : '' }}>
                                        {{ $car->reg_number }}
                                    </option>
                                @endforeach
                            </select>

                            <x-form.error name="search-reg_number" />

                            <x-form.submit>{{ __('Search') }}</x-form.submit>
                        </form>
                    </x-search>
                    @if (Auth::user()->isAdmin())
                        <div class="mt-2 mb-6">
                            <a href="/dashboard/cars/create"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                {{ __('New car') }}
                            </a>
                        </div>
                    @endif
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                {{ __('Brand') }}
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                {{ __('Model') }}
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                {{ __('Registration number') }}
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                {{ __('Owner') }}
                                            </div>
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cars as $car)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $car->brand }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $car->model }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $car->reg_number }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $car->owner->name }} {{ $car->owner->surname }}
                                                </div>
                                            </div>
                                        </td>
                                        @if (Auth::user()->isAdmin())
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/dashboard/cars/{{ $car->id }}/edit"
                                                    class="text-blue-500 hover:text-blue-600">{{ __('Edit') }}</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/dashboard/cars/{{ $car->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-xs text-red-400">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        @endif
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $cars->links() }}
        </div>
    </x-dashboard>
</x-layout>
