<div class="flex justify-center align-middle">

    <div>
        <img style="max-height: 8rem" class="rounded-full" src="/favicon.svg" alt="event image">
    </div>

    <div class="pl-3">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $event['name'] }}

        </h2>

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $event['description'] }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Max Kill: {{ $event['max_kill'] }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Public ID: {{ $event['random_id'] }}
        </h2>

        @if (Auth::user()->id == $event['user_id'])

            @if (Route::is('event.show'))
            @else
                <x-primary-button class="mt-3">

                    <a href="{{ route('event.show', ['id' => $event['id']]) }}">back</a>

                </x-primary-button>
            @endif

            <x-secondary-button class="mt-3">

                <a href="{{ route('event.edit', ['id' => $event['id']]) }}">Edit event</a>

            </x-secondary-button>


            <x-primary-button class="mt-3">

                <a href="/team/create/{{ $event['id'] }}">Register Teams</a>

            </x-primary-button>


            <x-green-button class="mt-3">

                <a href="/event/round/{{ $event['id'] }}">New round</a>

            </x-green-button>
        @endif

    </div>
</div>
