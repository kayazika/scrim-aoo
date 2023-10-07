<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="w-3/5 lg:w-full font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Event List
            </h2>
        </div>
    </x-slot>

    <div class="pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            @foreach ($event as $data)
                @csrf

                <a href="/event/show/{{ $data['id'] }}">
                    <div
                        class=" hover:bg-sky-700 m-6 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-1 text-gray-900 dark:text-gray-100">
                            <h1>{{ $data['name'] }}</h1>
                            <p>Description: {{ $data['description'] }}</p>
                            <p>Max Kill: {{ $data['max_kill'] }}</p>
                        </div>
                    </div>
                </a>
            @endforeach




        </div>
    </div>
</x-app-layout>
