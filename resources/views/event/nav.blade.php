<div class="flex justify-center align-middle">

    <div>
        <img style="max-height: 8rem" class="rounded-full" src="/favicon.svg" alt="event image">
    </div>

    <div class="pl-3">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $events->name }}

        </h2>

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $events->description }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Max Kill: {{ $events->max_kill }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Public ID: {{ $events->random_id }}
        </h2>

        @if (Auth::user()->id == $events->user_id)

            @if (Route::is('event.show'))
            @else
                <x-primary-button class="mt-3">

                    <a href="{{ route('event.show', ['id' => $events->id]) }}">back</a>

                </x-primary-button>
            @endif

            <x-secondary-button class="mt-3">

                <a href="{{ route('event.edit', ['id' => $events->id]) }}">Edit event</a>

            </x-secondary-button>


            <x-primary-button class="mt-3">

                <a href="/team/create/{{ $events->id }}">Register Teams</a>

            </x-primary-button>


            <x-green-button class="mt-3">

                <a href="/event/round/{{ $events->id }}">New round</a>

            </x-green-button>
        @endif

    </div>
</div>
