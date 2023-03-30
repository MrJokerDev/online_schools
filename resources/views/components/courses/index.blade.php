
<form action="{{ route('user_courses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Courses</label>
    <select id="countries" name="courses" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Courses</option>
        @foreach ($courses as $value)
            <option value="{{ $value->id }}">{{ $value->courses }}</option>
        @endforeach
    </select>

    <div class="inline-flex">
        <input type="submit" value="submit" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </div>
</form>

