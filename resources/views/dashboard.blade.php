<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event List') }}
        </h2>

    </x-slot>

    <div class="pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            @foreach ($events as $event)
                @csrf

                <a href="/event/show/{{$event->id}}">
                    <div class=" hover:bg-sky-700 m-6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-1 text-gray-900 dark:text-gray-100">
                            <h1>{{ $event->name }}</h1>
                            <p>Description: {{ $event->description }}</p>
                            <p>Max Kill: {{ $event->max_kill }}</p>
                        </div>
                    </div>
                </a>
            @endforeach




        </div>
    </div>
</x-app-layout>
