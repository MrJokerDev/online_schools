@foreach ($lessons as $lesson)
  <div
    class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden"
    style="padding-top: 56.25%">
      <iframe
          class="embed-responsive-item absolute top-0 right-0 bottom-0 left-0 h-full w-full"
          src="https://www.youtube.com/embed/{{ $lesson->lesson_video }}/enablejsapi=1&amp;origin=https%3A%2F%2Fmdbootstrap.com"
          allowfullscreen=""
          data-gtm-yt-inspected-2340190_699="true"
          id="240632615">
      </iframe>
  </div>

  <p>{!! html_entity_decode($lesson->description) !!}</p>
@endforeach

{{ $lessons->links() }}