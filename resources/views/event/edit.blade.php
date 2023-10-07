<x-app-layout>
    <x-slot name="header">
        @include('event.nav')
    </x-slot>

    <div class="flex pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="justify-center w-full max-w-xs">
                        <form action="{{ route('event.update', ['id' => $event['id']]) }}" class="w-full max-w-sm"
                            method="POST">
                            @csrf
                            <div class="mb-5">
                                <x-input-label for="name" :value="__('Event Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    value="{{ $event['name'] }}" required autofocus autocomplete="Event Name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-5">
                                <x-input-label for="kill" :value="__('Max Kill')" />
                                <x-text-input id="kill" class="block mt-1 w-full" type="number" name="kill"
                                    value="{{ $event['max_kill'] }}" required autofocus autocomplete="Max Kill" />
                                <x-input-error :messages="$errors->get('kill')" class="mt-2" />
                            </div>
                            <div class="mb-5">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text"
                                    name="description" value="{{ $event['description'] }}" required autofocus
                                    autocomplete="description" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div class="flex justify-between">
                                <x-primary-button>
                                    {{ __('update') }}
                                </x-primary-button>
                                <x-danger-button>

                                    <a href="{{ route('event.destroy', ['id' => $event['id']]) }}">DELETE EVENT</a>

                                </x-danger-button>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
    @include('team.edit')
</x-app-layout>
