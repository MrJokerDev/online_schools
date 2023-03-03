<div class="container my-24 px-6 mx-auto">
  <form action="{{ route('answers') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($questions as $question)
      <section class="mb-32 text-gray-800">
        <div class="flex flex-wrap items-center">
          <div class="grow-0 shrink-0 basis-auto w-full lg:w-4/12 mb-6 md:mb-0 px-3">
            <h2 class="text-3xl font-bold mb-6 dark:text-white">
              Question
            </h2>
            <p class="text-gray-500 mb-12 dark:text-white">
              {{ $question->questions }}
            </p>
          </div>

          <div class="grow-0 shrink-0 basis-auto w-full lg:w-8/12 mb-6 mb-md-0 px-3">
            <div class="flex flex-wrap">
              @foreach($question->answer as $option)
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-12/12 mb-12">
                  <div class="flex">
                    <div class="shrink-0 mt-1">
                      <input type="hidden" name="questions_id" value="{{ $option->questions_id }}" >
                      <input name="answer" type="radio" class="dark:md:hover:bg-blue-600" value="{{$option->answer}}" required>
                    </div>
                    <div class="grow ml-4">
                      <p class="font-bold mb-1 dark:text-white">{{ $option->answer }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    @endforeach

    <div class="inline-flex">
        <input type="submit" value="Next" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </div>
  </form>
</div>
