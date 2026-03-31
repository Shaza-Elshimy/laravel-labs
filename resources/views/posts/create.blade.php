<div> 
   <h1>Create Post</h1>
   <form method="POST" action="/posts">
    @csrf
    <input type="text" name="title">
    <br><br>
    <textarea name="body" placeholder="write the content"></textarea>
    <br><br>
    <button type="submit">Save</button>
   </form>
</div>
