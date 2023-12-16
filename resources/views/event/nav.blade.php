<div class="flex justify-center align-middle">

    {{-- <div>
        <img style="max-height: 8rem" class="rounded-full" src="/favicon.svg" alt="event image">
    </div> --}}

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

        @if (!Route::is('event.show'))
        <a href="{{ route('event.show', ['id' => $event['id']]) }}">
        <x-primary-button class="mt-3">


            Table

            </x-primary-button>
        </a>
        @endif
        <a href="/event/rounds/{{ $event['id'] }}">
        <x-secondary-button class="mt-3">

            Rounds

        </x-secondary-button>
    </a>
        {{-- @if (Auth::user()->id == $event['user_id']) --}}
        @if (Auth::guest())
        @elseif (Auth::user()->id == $event['user_id'])
        <a href="{{ route('event.edit', ['id' => $event['id']]) }}">
        <x-secondary-button class="mt-3">

                Edit event

            </x-secondary-button>
        </a>
        <a href="/team/create/{{ $event['id'] }}">
            <x-secondary-button class="mt-3">

                Register Teams

            </x-secondary-button>
        </a>


        <a href="/event/round/{{ $event['id'] }}">
            <x-green-button class="mt-3">

                New round

            </x-green-button>
        </a>
        @endif

    </div>
</div>
