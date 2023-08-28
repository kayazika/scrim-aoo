<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="w-full max-w-xs">
                        <form action="/event/store" class="w-full max-w-sm" method="POST">
                            @csrf
                            <label for="name">Event Name</label> <br>
                            <input type="text" name="name">   <br>
                            <label for="kill">Max Kill</label> <br>
                            <input type="number" name="kill"> <br>
                            <label for="description">Description</label><br>
                            <input type="text" name="description"><br>
                            <button>Create</button>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
