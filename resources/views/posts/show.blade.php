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
    </div>
  </div>
</div>
</div>
