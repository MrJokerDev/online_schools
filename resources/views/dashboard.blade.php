<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:border-gray-700">
                @if ($user->payment_status == 'inactive')
                    @include('user_status')
                @else
                    @if ($user->courses_id == null)
                        @include('components.courses.index')
                    @else
                        @if ($user->result_test == 0) 
                            @include('components.questions.question')
                            @include('components.questions.submit_result') 
                        @else

                            {{-- Fullstack --}}
                            @if ($user->level == 1 && $user->courses_id == 1) 
                                @include('components.fullstack.junior.index')
                            @elseif ($user->level == 2 && $user->courses_id == 1)
                                @include('components.fullstack.strong_junior.index')
                            @elseif ($user->level == 3 && $user->courses_id == 1) 
                                @include('components.fullstack.middle.index')
                                
                            {{-- Front-End --}}
                            @elseif ($user->level == 1 && $user->courses_id == 2)
                                @include('components.frontend.junior.index')
                            @elseif ($user->level == 2 && $user->courses_id == 2)
                                @include('components.frontend.strong_junior.index')
                            @elseif ($user->level == 3 && $user->courses_id == 2) 
                                @include('components.frontend.middle.index')
                            @endif
                            
                        @endif
                    @endif
                @endif
                
            </div>
        </div>
    </div>

</x-app-layout>
