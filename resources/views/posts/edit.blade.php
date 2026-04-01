<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">
            Edit Post
        </h1>

        <form method="POST" action="/posts/{{ $post['id'] }}" class="space-y-4">
            @csrf
            @method("put")

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Title
                </label>
                <input 
                    type="text" 
                    name="title"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter post title"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Content
                </label>
                <textarea 
                    name="body"
                    rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Write your content..."
                ></textarea>
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200"
            >
                Update Post
            </button>
        </form>

    </div>

</div>