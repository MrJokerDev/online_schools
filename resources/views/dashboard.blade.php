<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                @if ($user->result_test == 0 ) 
                    @include('components.questions.question')
                    @include('components.questions.submit_result') 
                @else
                    @if ($user->status == 'junior') 
                        @include('components.fullstack.junior.index')
                    @elseif ($user->status == 'strong_junior')
                        @include('components.fullstack.strong_junior.index') 
                    @elseif ($user->status == 'middle') 
                        @include('components.fullstack.middle.index')
                    @endif
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
