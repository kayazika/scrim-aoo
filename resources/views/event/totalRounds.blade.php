<x-app-layout>
    <x-slot name="header">

        @include('event.nav')

    </x-slot>

    <div class="py-6">

        <div class="flex justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm">
                <div class="">
                    @if (count($teams) < 1)

                        <p class="px-9 py-9 md:text-dark dark:text-white">
                            Please register new teams!
                        </p>
                    @else
                        @foreach ($rounds as $round)
                            <div class="mb-4">
                                <div class="flex justify-center text-white bg-gray-500">
                                    <h1>Round {{ $loop->iteration }}</h1>
                                </div>
                                <div class="">
                                    <table class="table-fixed md:text-gray-50 dark:text-white">
                                        <thead>
                                            <tr class="bg-gray-300 text-black dark:text-white dark:bg-gray-700">
                                                <th class="px-9 py-1">Position</th>
                                                <th class="px-9 py-1">Team</th>
                                                <th class="px-9 py-1">Kill</th>
                                                <th class="px-9 py-1">Point</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($round as $value)
                                                <tr
                                                    class="text-center text-black dark:text-white even:bg-gray-300 odd:bg-gray-400 dark:even:bg-gray-700 dark:odd:bg-gray-800">
                                                    <td class="px-9 py-1">{{ $loop->iteration }}</td>
                                                    <td class="px-9 py-1">{{ $value['team_name'] }}</td>
                                                    <td class="px-9 py-1">{{ $value['kill'] }}</td>
                                                    <td class="px-9 py-1">{{ $value['point'] }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>


            </div>
        </div>
    </div>
</x-app-layout>
