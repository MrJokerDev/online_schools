<h1>Junior</h1>
@if ($lesson_level == 'junior')
  @foreach ($lesson_level as $lesson)
    <div
    class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden"
    style="padding-top: 56.25%">
      <iframe
          class="embed-responsive-item absolute top-0 right-0 bottom-0 left-0 h-full w-full"
          src="{{ $user_lessons->lesson_video }}?enablejsapi=1&amp;origin=https%3A%2F%2Fmdbootstrap.com"
          allowfullscreen=""
          data-gtm-yt-inspected-2340190_699="true"
          id="240632615">
      </iframe>
  </div>

  <h1>{{ $user_lessons->title }}</h1>
  <p>{{ $user_lessons->description }}</p>
  @endforeach

  @endif