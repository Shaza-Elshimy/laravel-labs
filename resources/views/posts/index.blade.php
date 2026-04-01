<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div>
    <h1 class="text-center text-4xl text-orange-700">All Posts</h1>

    @foreach($posts as $post)
        <div class="border-2 border-black bg-white p-4 shadow-[4px_4px_0_0] sm:p-6 m-4">

            <a href="/posts/{{ $post['id'] }}">
                <h2 class="text-2xl font-semibold hover:text-orange-600">
                    {{ $post['title'] }}
                </h2>
            </a>

            <p class="mt-2 text-gray-600">
                {{ $post['body'] }}
            </p>


            <form 
                method="POST" 
                action="/posts/{{ $post['id'] }}"
                onsubmit="return confirm('Are you sure you want to delete this post?')"
                class="mt-4"
            >
                @csrf
                @method('DELETE')

                <button 
                    type="submit"
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                >
                    Delete
                </button>
            </form>

        </div>
    @endforeach
</div>