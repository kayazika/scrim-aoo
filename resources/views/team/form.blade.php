<div class="flex py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex justify-center p-6 text-gray-900 dark:text-gray-100">

                <div class="w-full max-w-xs">

                    <form action="/team/store/{{ $event['id'] }}" class="w-full max-w-sm" method="POST">
                        @csrf

                        @for ($i = 1; $i <= 20; $i++)
                            <div @class(['pb-4', 'font-bold' => true])>
                                <x-input-label for="team_name_{{ $i }}" value="Team {{ $i }}" />
                                <x-text-input-empty name="team_name_{{ $i }}" />
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

