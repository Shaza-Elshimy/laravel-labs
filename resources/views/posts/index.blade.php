<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<div>
 <h1 class="text-center text-4xl text-orange-700">All Posts</h1>
 @foreach($posts as $post)
    <a href="/posts/{{ $post['id'] }}" class="block border-2 border-black bg-white p-4 shadow-[4px_4px_0_0] hover:bg-yellow-100 focus:ring-2 focus:ring-yellow-300 focus:outline-0 sm:p-6 m-4">
        <h2 class="mt-1 text-2xl font-semibold">{{ $post['title'] }}</h2>
        <p class="mt-2 line-clamp-2 text-pertty">{{ $post['body'] }}</p>
    </a>
</div>
@endforeach