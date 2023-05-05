<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('User Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("User Information.") }}
        </p>
    </header>
        <ul class="my-4 space-y-3">
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your Result test</span>
                    <span class="bg-gray-900 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-500 dark:text-white">{{ $user->result_test }}</span> 
                </div>
            </li>
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your status</span>
                    <span class="bg-green-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-500 dark:text-white">{{ $user->status }}</span>
                </div>
            </li>
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your mail</span>
                    @if($user->email_verified_at == null)
                        <span class="bg-gray-900 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-500 dark:text-white">Not verify mail</span> 
                    @else
                        <span class="bg-green-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-500 dark:text-white">verify</span> 
                    @endif
                </div>
            </li>
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your level</span>
                    @if($user->id == 1)
                        <span class="bg-gray-900 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-500 dark:text-white">super admin</span> 
                    @elseif($user->level == null)
                        <span class="bg-green-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-500 dark:text-white">new user</span> 
                    @else
                        @foreach($levels as $level)
                            @if($user->level == $level->id)
                                <span class="bg-yellow-500 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-500 dark:text-white">{{ $level->level }}</span> 
                            @endif
                        @endforeach
                    @endif
                </div>
            </li>
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your Course</span>
                    @if($user->id == 1)
                        <span class="bg-gray-900 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-500 dark:text-white">super admin</span> 
                    @elseif($user->courses_id == 0)
                        <span class="bg-green-600 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-500 dark:text-white">new user</span> 
                    @else
                        <span class="bg-yellow-500 text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-500 dark:text-white">{{ $user_course->courses }}</span> 
                    @endif
                </div>
            </li>
        </ul>
</section>