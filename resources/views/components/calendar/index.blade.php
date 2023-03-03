<form
    action="{{ route('calendar') }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" >
    <label
        for="countries"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birinchi kun</label>
    <select
        id="countries"
        name="first_lesson_day"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected="selected">Tanlash</option>
        <option value="Dushanba">Dushanba</option>
        <option value="Seshanba">Seshanba</option>
        <option value="Chorshanba">Chorshanba</option>
        <option value="Payshanba">Payshanba</option>
        <option value="Juma">Juma</option>
        <option value="Shanba">Shanba</option>
        <option value="Yakshanba">Yakshanba</option>
    </select>

    <label
        for="countries"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ikkinchi kun</label>
    <select
        id="countries"
        name="second_lesson_day"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected="selected">Tanlash</option>
        <option value="Dushanba">Dushanba</option>
        <option value="Seshanba">Seshanba</option>
        <option value="Chorshanba">Chorshanba</option>
        <option value="Payshanba">Payshanba</option>
        <option value="Juma">Juma</option>
        <option value="Shanba">Shanba</option>
        <option value="Yakshanba">Yakshanba</option>
    </select>

    <label
        for="countries"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uchinchi kun</label>
    <select
        id="countries"
        name="third_lesson_day"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected="selected">Tanlash</option>
        <option value="Dushanba">Dushanba</option>
        <option value="Seshanba">Seshanba</option>
        <option value="Chorshanba">Chorshanba</option>
        <option value="Payshanba">Payshanba</option>
        <option value="Juma">Juma</option>
        <option value="Shanba">Shanba</option>
        <option value="Yakshanba">Yakshanba</option>
    </select>
    <div class="inline-flex">
        <input
            type="submit"
            value="Next"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"></div>
    </form>