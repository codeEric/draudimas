<x-layout>
    <x-dashboard heading="Manage owners">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6
          lg:px-8">
                    <x-search heading="Search for owners">
                        <form method="POST" action="/dashboard/owners/search">
                            @csrf
                            <x-form.input name="search-name" labelName="Name" value="{{ $filter->name }}" />
                            <x-form.input name="search-surname" labelName="Surname" value="{{ $filter->surname }}" />
                            <x-form.submit>{{ __('Search') }}</x-form.submit>
                        </form>
                    </x-search>
                    @auth

                        @if (Auth::user()->isAdmin())
                            <div class="mt-2 mb-6">
                                <a href="/dashboard/owners/create"
                                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                    {{ __('New owner') }}
                                </a>

                            </div>
                        @endif
                    @endauth
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                {{ __('Name') }}
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm text-black-900 font-bold">
                                                {{ __('Surname') }}
                                            </div>
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($owners as $owner)
                                    @can('can-view-owner', $owner)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $owner->name }}
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $owner->surname }}
                                                    </div>
                                                </div>
                                            </td>
                                            @auth

                                                @if (Auth::user()->isAdmin())
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="/dashboard/owners/{{ $owner->id }}/edit"
                                                            class="text-blue-500 hover:text-blue-600">{{ __('Edit') }}</a>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <form method="POST" action="/dashboard/owners/{{ $owner->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-xs text-red-400">{{ __('Delete') }}</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            @endauth
                                        @endcan
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $owners->links() }}
        </div>
    </x-dashboard>
</x-layout>
