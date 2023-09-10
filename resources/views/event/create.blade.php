<x-app-layout>
    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="mr-3" href="/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 2rem" fill="none" viewBox="0 0 24 24"
                    strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 text-gray-900 dark:text-gray-100">

                    <div class="justify-center w-full max-w-xs">
                        <form action="/event/store" class="w-full max-w-sm" method="POST">
                            @csrf
                            <div class="mb-5">
                                <x-input-label for="name" :value="__('Event Name')" />
                                <x-text-input  id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="Event Name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-5">
                                <x-input-label for="kill" :value="__('Max Kill')" />
                                <x-text-input id="kill" class="block mt-1 w-full" type="number" name="kill" :value="old('kill')" required autofocus autocomplete="Max Kill" />
                                <x-input-error :messages="$errors->get('kill')" class="mt-2" />
                            </div>
                            <div class="mb-5">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <x-primary-button>
                                {{ __('Create') }}
                            </x-primary-button>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
