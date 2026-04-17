<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    //
    function index() {
        // $posts=Post::all();
        $posts = Post::with('user')->paginate(10);

    return PostResource::collection($posts);
    }


    function show($id) {
    $post = Post::with('user')->find($id);
    if (!$post) {
        return response()->json(['message' => 'Post not found'], 404);
    }

    return new PostResource($post);
}

function store(Request $request) {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'user_id' => 'required|exists:users,id'
    ]);
    Post::create([
        "title"=>$request->title,
        "body"=>$request->body,
        "image" => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null,
        "user_id"=>$request->user_id
    ]);


    return "post created";
}


function update($id,Request $request) {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    //update in database
    $post=Post::find($id);
    $post->title=$request->title;
    $post->body=$request->body;
    if($request->hasFile('image')){
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $post->image = $request->file('image')->store('images', 'public');
    }
    // $post->user_id=$request->user_id;

    $post->save();
    return "update successfully";
}


function destroy($id) {
  //delete from database
    Post::destroy($id);
    return "post deleted";
}
}
