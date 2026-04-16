<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    function index() {
        $posts=post::all();

    return $posts;
    }


    function show($id) {
    $post = Post::with('comments')->find($id);

    return $post;
}

function store(Request $request) {
    Post::create([
        "title"=>$request->title,
        "body"=>$request->body,
        "image" => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null,
        "user_id"=>$request->user_id
    ]);


    return "post created";
}


function update($id,Request $request) {
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
