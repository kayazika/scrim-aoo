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
            {{ __('New Round') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full max-w-xs ">

                            @if (array_key_exists('kill', $teams[0]))
                            <form action="/event/round/store/{{ $event_id }}" class="mx-5 w-full max-w-sm" method="POST">
                                @csrf

                                @php
                                    $i = 0;
                                @endphp

                                @foreach ($teams as $team)
                                    @php
                                        $i++;
                                    @endphp
                                    <div @class(['pb-4', 'bg-gray-300', 'dark:bg-gray-700', 'font-bold', 'mb-4', 'mx-4', 'rounded'])>
                                        <x-input-label class="mb-2 pt-2 ml-4" for="Team Name" value="{{ $team['team_name'] }}" />

                                        <x-input-label for="team_id_{{ $i  }}" />
                                        <x-text-input type="hidden" value="{{ $team['id'] }}"
                                            name="team_id_{{ $i }}" />

                                        <x-input-label for="team_id_{{ $i  }}" />
                                        <x-text-input type="hidden" value="{{ $team['team_name'] }}"
                                            name="team_name_{{ $i }}" />

                                        <x-input-label for="actual_team_kill_{{ $i  }}" />
                                        <x-text-input type="hidden" value="{{ $team['kill'] }}"
                                            name="actual_team_kill_{{ $i }}" />

                                        <x-input-label for="actual_team_point{{ $i  }}" />
                                        <x-text-input type="hidden" value="{{ $team['point'] }}"
                                            name="actual_team_point_{{ $i }}" />

                                        <x-input-label for="team_kill_{{ $i }}" value="Kill" class="mb-2 pt-2 ml-4"/>
                                        <x-text-input type="number" name="team_kill_{{ $i }}" class="mb-2 pt-2 ml-4"/>

                                        <x-input-label for="team_position_{{ $i }}" value="Position" class="mb-2 pt-2 ml-4"/>
                                        <x-text-input type="number" name="team_position_{{ $i }}" class="mb-2 pt-2 ml-4"/>

                                    </div>
                                @endforeach

                                <x-primary-button class="mt-3 mb-2 pt-2 ml-4">
                                    {{ __('Add Round') }}
                                </x-primary-button>
                            </form>

                            @else

                            <form action="/event/round/store/{{ $event_id }}" class="w-full max-w-sm" method="POST">
                                @csrf

                                @php
                                    $i = 0;
                                @endphp

                                @foreach ($teams as $team)
                                    @php
                                        $i++;
                                    @endphp
                                    <div @class(['pb-4', 'bg-gray-300', 'dark:bg-gray-700', 'font-bold', 'mb-4', 'mx-4', 'rounded'])>
                                        <x-input-label class="mb-2 pt-2 ml-4" for="Team Name" value="{{ $team['team_name'] }}" />

                                        <x-input-label for="team_id_{{ $i  }}" />
                                        <x-text-input type="hidden" value="{{ $team['id'] }}"
                                            name="team_id_{{ $i }}" />

                                        <x-input-label for="team_id_{{ $i  }}" />
                                        <x-text-input type="hidden" value="{{ $team['team_name'] }}"
                                            name="team_name_{{ $i }}" />

                                        <x-input-label for="team_kill_{{ $i }}" value="Kill" class="mb-2 pt-2 ml-4"/>
                                        <x-text-input type="number" name="team_kill_{{ $i }}" class="mb-2 pt-2 ml-4"/>

                                        <x-input-label for="team_position_{{ $i }}" value="Position" class="mb-2 pt-2 ml-4"/>
                                        <x-text-input type="number" name="team_position_{{ $i }}" class="mb-2 pt-2 ml-4"/>

                                    </div>
                                @endforeach

                                <x-primary-button class="mt-3 mb-2 pt-2 ml-4">
                                    {{ __('Add Round') }}
                                </x-primary-button>
                            </form>

                            @endif


                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
