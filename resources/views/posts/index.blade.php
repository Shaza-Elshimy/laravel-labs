<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div>
    <h1 class="text-center text-4xl text-orange-700">All Posts</h1>

    @foreach($posts as $post)
        <div class="border-2 border-black bg-white p-4 shadow-[4px_4px_0_0] sm:p-6 m-4">

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-[200px] h-auto mb-4 rounded">
            @endif
            <a href="/posts/{{ $post['id'] }}">
                <h2 class="text-2xl font-semibold hover:text-orange-600">
                    {{ $post['title'] }}
                </h2>
            </a>

            <p class="mt-2 text-gray-600">
                {{ $post['body'] }}
            </p>
            <p class="mt-2 text-sm text-gray-500">
                By : {{ $post->user->name }}
            </p>
            <p class="mt-2 text-sm text-gray-500">
                created at : {{ $post->created_at->format('M d, Y') }}
            </p>
            <br>

            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-red-600">
                <a href="/posts/{{$post['id']}}">View</a>
            </button>

            <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-red-600">
                <a href="/posts/{{$post['id']}}/edit">Edit</a>
            </button>

            <form 
                method="POST" 
                action="/posts/{{ $post['id'] }}"
                onsubmit="return confirm('Are you sure you want to delete this post?')"
                class="mt-4 inline"
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
    <div class="m-4"> {{ $posts->links() }}</div>
<a href="/posts/create" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 m-auto block w-max">
    Create post
</a>    
</div>
<br>
<div>
    <h2 class="text-center text-3xl text-red-700 mt-8">Deleted Posts</h2>

    @foreach($deletedPosts as $post)
        <div class="border-2 border-black bg-white p-4 shadow-[4px_4px_0_0] sm:p-6 m-4">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-[200px] h-auto mb-4 rounded">
            @endif

            <h2 class="text-2xl font-semibold text-gray-500 line-through">
                {{ $post['title'] }}
            </h2>

            <p class="mt-2 text-gray-600 line-through">
                {{ $post['body'] }}
            </p>
            <p class="mt-2 text-sm text-gray-500 line-through">
                By : {{ $post->user->name }}
            </p>
            <p class="mt-2 text-sm text-gray-500 line-through">
                created at : {{ $post->created_at->format('M d, Y') }}
            </p>
            <br>

            <form 
                method="POST" 
                action="{{ route('posts.restore', $post) }}"
                onsubmit="return confirm('Are you sure you want to restore this post?')"
                class="mt-4 inline"
            >
                @csrf

                <button 
                    type="submit"
                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"
                >
                    Restore
                </button>
            </form>
            <form 
                method="POST" 
                action="{{ route('posts.forceDelete', $post) }}"
                onsubmit="return confirm('Are you sure you want to permanently delete this post?')"
                class="mt-4 inline"
            >
                @csrf
                @method('DELETE')   
                <button 
                    type="submit"
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                >
                    Force Delete
                </button>
            </form>
            
        </div>
    @endforeach