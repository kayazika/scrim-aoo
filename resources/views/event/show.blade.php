<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="flex justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="table-auto text-white md:text-gray-50 dark:text-white">
                    <thead>
                        <tr class="bg-gray-500 dark:bg-gray-700">
                            <th class="px-9 py-1">Event</th>
                            <th class="px-9 py-1">Description</th>
                            <th class="px-9 py-1">Max Kill</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr class="text-center even:bg-gray-700 odd:bg-gray-800">
                                <td class="px-9 py-1">{{ $event->name }}</td>
                                <td class="px-9 py-1">{{ $event->description }}</td>
                                <td class="px-9 py-1">{{ $event->max_kill }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
</x-app-layout>
