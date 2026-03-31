<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts=[
        ['id'=>1,'title'=>'post 1','body'=>'content 1'],
        ['id'=>2,'title'=>'post 2','body'=>'content 2'],
        ['id'=>3,'title'=>'post 3','body'=>'content 3'],
        ['id'=>4,'title'=>'post 4','body'=>'content 4'],
        ['id'=>5,'title'=>'post 5','body'=>'content 5'],
        ['id'=>6,'title'=>'post 6','body'=>'content 6']
    ];
    return view('posts.index',compact('posts'));
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

Route::post('/posts', function (Request $request) {
    $newPost=['id'=>rand(100,999),'title'=>$request->title, 'body'=>$request->body];
    return redirect('/posts');
});
