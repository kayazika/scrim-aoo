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

<x-secondary-button class="mt-3">

        <a href="{{ route('event.edit', ['id' => $events->id]) }}">Edit event</a>

    </x-secondary-button>

    @if (count($teams) >= 20)
    @else
        <x-primary-button class="mt-3">

            <a href="/team/create/{{ $events->id }}">Register Teams</a>

        </x-primary-button>
    @endif
        @if (count($teams) > 1)
    <x-green-button class="mt-3">

        <a href="/event/round/{{ $events->id }}">New round</a>

    </x-green-button>
    @endif
@endif
