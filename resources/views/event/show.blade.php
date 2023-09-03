<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $events->name }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Description: {{ $events->description }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Max Kill: {{ $events->max_kill }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Public ID: {{ $events->random_id }}
        </h2>

        @if (Auth::user()->id == $events->user_id)


            <x-danger-button class="mt-3">

                <a href="{{  route('event.destroy', ['id' => $events->id]) }}">DELETE EVENT</a>

            </x-danger-button>

            <x-secondary-button class="mt-3">

                <a href="{{ route('event.edit', ['id' => $events->id]) }}">Edit event</a>

            </x-secondary-button>

            @if (count($teams) >= 20)
            @else
                <x-primary-button class="mt-3">

                    <a href="/team/create/{{ $events->id }}">Register Teams</a>

                </x-primary-button>
            @endif

        @endif


    </x-slot>

    <div class="py-12">

        <div class="justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @if (count($teams) < 1)

                    <p class="px-9 py-9 md:text-dark dark:text-white">
                        Please register new teams!
                    </p>
                @else
                    <table class="table-auto text-white md:text-gray-50 dark:text-white">
                        <thead>
                            <tr class="bg-gray-500 dark:bg-gray-700">
                                <th class="px-9 py-1">Position</th>
                                <th class="px-9 py-1">Team</th>
                                <th class="px-9 py-1">Kill</th>
                                <th class="px-9 py-1">Point</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr class="text-center even:bg-gray-700 odd:bg-gray-800">
                                    <td class="px-9 py-1">{{ $loop->iteration }}</td>
                                    <td class="px-9 py-1">{{ $team->team_name }}</td>
                                    <td class="px-9 py-1">{{ $team->kill }}</td>
                                    <td class="px-9 py-1">{{ $team->point }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif




            </div>
        </div>
    </div>
</x-app-layout>
