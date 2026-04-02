<?php
//     [
//     ['id'=>1,'title'=>'Learn Laravel Basics','body'=>'Introduction to routing and views in Laravel'],
//     ['id'=>2,'title'=>'Blade Templates','body'=>'Understanding how Blade works in Laravel'],
//     ['id'=>3,'title'=>'Forms in Laravel','body'=>'Handling form submissions and CSRF protection'],
//     ['id'=>4,'title'=>'Working with Arrays','body'=>'Using arrays instead of database for practice'],
//     ['id'=>5,'title'=>'Laravel Routing','body'=>'Defining routes and passing parameters'],
//     ['id'=>6,'title'=>'Show Single Post','body'=>'Displaying one post using dynamic routes'],
//     ['id'=>7,'title'=>'Frontend Basics','body'=>'Simple HTML and CSS for your views'],
//     ['id'=>8,'title'=>'Debugging Errors','body'=>'How to read and fix Laravel errors'],
//     ['id'=>9,'title'=>'Git Commits','body'=>'Writing clean and meaningful commit messages'],
//     ['id'=>10,'title'=>'Future Steps','body'=>'Moving from arrays to database and models'],
// ]
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
class PostController extends Controller
{
    function index() {
    $posts = Post::with('user')->paginate(10);
    $deletedPosts = Post::onlyTrashed()->get();

    return view('posts.index',compact('posts','deletedPosts'));
}


function create() {
    $users = User::all();
    
    return view('posts.create', compact('users'));
}



function store(StorePostRequest $request) {
    Post::create([
        "title"=>$request->title,
        "body"=>$request->body,
        "user_id"=>$request->user_id
    ]);


    return redirect('/posts');
}

function show($id) {
    $post = Post::with('comments')->find($id);
    $users = User::all();

    return view('posts.show',compact('post','users'));
}

function edit($id) {
    $post=Post::find($id);
    $users = User::all();
    return view('posts.edit',compact('post','users'));
}

function update($id,UpdatePostRequest $request) {
    //update in database
    $post=Post::find($id);
    $post->title=$request->title;
    $post->body=$request->body;
    $post->user_id=$request->user_id;
    $post->save();
    return redirect('/posts');
}

function destroy($id) {
  //delete from database
    Post::destroy($id);
    return redirect('/posts');
}

function restore($id) {
    Post::onlyTrashed()->find($id)->restore();
    return redirect('/posts');

}

function addComment($id,Request $request){
    $post = Post::find($id);
    $post->comments()->create([
        'body' => $request->body
    ]);
    return redirect("/posts/$id");
}
}
