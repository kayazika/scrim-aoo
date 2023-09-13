<x-app-layout>
    <x-slot name="header">

        @include('event.nav')

    </x-slot>

    <div class="py-6">

        <div class="flex justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex ">
                    @if (count($teams) < 1)

                        <p class="px-9 py-9 md:text-dark dark:text-white">
                            Please register new teams!
                        </p>
                    @else

                        <table class="table-auto md:text-gray-50 dark:text-white">
                            <thead>
                                <tr class="bg-gray-300 text-black dark:text-white dark:bg-gray-700">
                                    <th class="px-9 py-1">Position</th>
                                    <th class="px-9 py-1">Team</th>
                                    <th class="px-9 py-1">Kill</th>
                                    <th class="px-9 py-1">Point</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($rounds))
                                 @foreach ($teams as $team)
                                    <tr class="text-center text-black dark:text-white even:bg-gray-300 odd:bg-gray-400 dark:even:bg-gray-700 dark:odd:bg-gray-800">
                                        <td class="px-9 py-1">{{ $loop->iteration }}</td>
                                        <td class="px-9 py-1">{{ $team['team_name'] }}</td>
                                        <td class="px-9 py-1">-</td>
                                        <td class="px-9 py-1">-</td>

                                    </tr>
                                @endforeach

                                @else
                                @foreach ($rounds as $round)
                                <tr class="text-center text-black dark:text-white even:bg-gray-300 odd:bg-gray-400 dark:even:bg-gray-700 dark:odd:bg-gray-800">
                                    <td class="px-9 py-1">{{ $loop->iteration }}</td>
                                    <td class="px-9 py-1">{{ $round['team_name'] }}</td>
                                    <td class="px-9 py-1">{{ $round['kill'] }}</td>
                                    <td class="px-9 py-1">{{ $round['point'] }}</td>

                                </tr>
                            @endforeach


                                @endif

                            </tbody>
                        </table>
                    @endif

                </div>


            </div>
        </div>
    </div>
</x-app-layout>
