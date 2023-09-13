<div class="flex py-6">
    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px8">
        <div class=" flex bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="justify-center  text-gray-900 dark:text-gray-100">



                @foreach ($teams as $team)
                    <div class="flex justify-between mb-2 p-3">
                        <div>
                            > <strong>{{ $team->team_name }}</strong><br>
                        </div>
                        <div class="pl-6">
                            <a href="/team/delete/{{ $team->event_id }}/{{ $team->id }}">
                                <x-danger-button>
                                    delete
                                </x-danger-button>
                            </a>

                        </div>

                    </div>
                    <div class="mt-2 pb-2">
                        <span><hr></span>
                    </div>
                @endforeach





            </div>
        </div>
    </div>
</div>
