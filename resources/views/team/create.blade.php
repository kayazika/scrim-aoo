<x-app-layout>
    <x-slot name="header">
        @include('event.nav')
        <h2 class="flex mt-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="mr-3 " href="/event/show/{{ $events->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 2rem" fill="none" viewBox="0 0 24 24"
                    strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            {{ __('Register teams') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 text-gray-900 dark:text-gray-100">

                    <div class="w-full max-w-xs">

                        <form action="/team/store/{{ $events->id }}" class="w-full max-w-sm" method="POST">
                            @csrf

                            @for ($i = 1; $i <= 20; $i++)
                                <div @class(['pb-4', 'font-bold' => true])>
                                    <x-input-label for="team_name_{{ $i }}" value="Team {{ $i }}" />
                                    <x-text-input-empty name="team_name_{{ $i }}"/>
                                </div>
                            @endfor
                            <x-primary-button class="mt-3">
                                {{ __('Register') }}
                            </x-primary-button>
                        </form>


                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
