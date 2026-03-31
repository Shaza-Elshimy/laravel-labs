<div>
 <h1>All Posts</h1>
 @foreach($posts as $post)
 <h2>{{ $post['title'] }}</h2>
 <p>{{ $post['body'] }}</p>
</div>
@endforeach