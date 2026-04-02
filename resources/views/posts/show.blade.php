<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<div>
    <div class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
  <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">

    <h2 id="modalTitle" class="text-xl font-bold text-gray-900 sm:text-2xl">{{$post['title']}}</h2>

    <div class="mt-4">
      <p class="text-pretty text-gray-700">
        {{$post['body']}}
      </p>
      <p class="mt-2 text-sm text-gray-500">
                By {{ $post->user->name }}
      </p>
      <p class="mt-2 text-sm text-gray-500">
        created at : {{ $post->created_at->format('M d, Y') }}
      </p>
      <h2 class="text-lg font-semibold text-gray-900 mt-4">Comments:</h2>
      @foreach($post->comments as $comment)
        <div class="mt-2 p-4 bg-gray-100 rounded">
          <p class="text-gray-700">{{ $comment->body }}</p>
        </div>
      @endforeach
    </div>
    <form method="POST" action="/posts/{{ $post['id'] }}/comments" class="mt-4">
        @csrf
        <textarea name="body" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add a comment..."></textarea>
        <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">Submit Comment</button>
    </form>
    <div class="mt-4 flex justify-end">
      <a href="/posts" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-200">Close</a>
    </div>
  </div>
</div>
</div>
