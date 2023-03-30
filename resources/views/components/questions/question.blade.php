<div class="container my-24 px-6 mx-auto">
  <form action="{{ route('answers') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($questions as $key => $question)
      <section class="mb-32 text-gray-800">
        <div class="flex flex-wrap items-center">
          <div class="grow-0 shrink-0 basis-auto w-full lg:w-4/12 mb-6 md:mb-0 px-3">
            <h2 class="text-3xl font-bold mb-6 dark:text-white">
              {{ $key+1 }}. {{ $question->questions }}
            </h2>

            <p class="text-gray-500 mb-12 dark:text-white">
              {{ $question->description }}
            </p>

            <input type="hidden" name="question_id" value="{{ $question->id }}" >

            @if ($question->type == 'select')
                <input type="hidden" name="type" value="{{$question->type}}" >
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select name="answer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  <option value="">Select Item</option>
                  @foreach($question->answer as $key => $option)
                    <option value="{{ $option->answer }}"> {{ $option->answer }} </option>
                  @endforeach
                </select>

            @elseif($question->type == 'checkbox')
              @foreach($question->answer as $key => $option)
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-12/12">
                  <div class="flex">
                    <div class="shrink-0 mt-1">
                      {{ $key+1 }} .
                      <input type="hidden" name="type" value="{{$question->type}}" >
                      <input name="answer[]" type="{{$question->type}}" class="dark:md:hover:bg-blue-600" value="{{$option->answer}}">
                    </div>
                    <div class="grow ml-4">
                      <p class="font-bold mb-1 dark:text-white">{{ $option->answer }}</p>
                    </div>
                  </div>
                </div>
              @endforeach

            @else
              @foreach($question->answer as $key => $option)
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-12/12">
                  <div class="flex">
                    <div class="shrink-0 mt-1">
                      {{ $key+1 }} .
                      <input type="hidden" name="type" value="{{$question->type}}" >
                      <input name="answer" type="{{$question->type}}" class="dark:md:hover:bg-blue-600" value="{{$option->answer}}" required>
                    </div>
                    <div class="grow ml-4">
                      <p class="font-bold mb-1 dark:text-white">{{ $option->answer }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
        </div>
      </section>
    @endforeach

    <div class="inline-flex">
        <input type="submit" value="Next" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </div>
  </form>
</div>
