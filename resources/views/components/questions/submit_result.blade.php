<form action="{{ route('user_answers') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <input type="submit" value="Finished" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
</form>
