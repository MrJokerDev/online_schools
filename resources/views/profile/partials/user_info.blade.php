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
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ $user->result_test }}</span>
                </div>
            </li>
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your status</span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ $user->status }}</span>
                </div>
            </li>
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your level</span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ $user_level->level }}</span>
                </div>
            </li>
            <li>
                <div class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 ">
                    <span class="flex-1 ml-3 whitespace-nowrap">Your Course</span>
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ $user_course->courses }}</span>
                </div>
            </li>
        </ul>
</section>