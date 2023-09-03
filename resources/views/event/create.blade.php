<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 text-gray-900 dark:text-gray-100">

                    <div class="justify-center w-full max-w-xs">
                        <form action="/event/store" class="text-center w-full max-w-sm" method="POST">
                            @csrf
                            <label for="name">Event Name</label> <br>
                            <input class="text-black" type="text" name="name">   <br>
                            <label for="kill">Max Kill</label> <br>
                            <input class="text-black" type="number" name="kill"> <br>
                            <label for="description">Description</label><br>
                            <input class="px-3 py-10 text-black" type="textarea" name="description"><br>
                            <x-primary-button class="mt-2" >
                                {{ __('Create') }}
                            </x-primary-button>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
