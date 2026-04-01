<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = [
    ['id'=>1,'title'=>'Learn Laravel Basics','body'=>'Introduction to routing and views in Laravel'],
    ['id'=>2,'title'=>'Blade Templates','body'=>'Understanding how Blade works in Laravel'],
    ['id'=>3,'title'=>'Forms in Laravel','body'=>'Handling form submissions and CSRF protection'],
    ['id'=>4,'title'=>'Working with Arrays','body'=>'Using arrays instead of database for practice'],
    ['id'=>5,'title'=>'Laravel Routing','body'=>'Defining routes and passing parameters'],
    ['id'=>6,'title'=>'Show Single Post','body'=>'Displaying one post using dynamic routes'],
    ['id'=>7,'title'=>'Frontend Basics','body'=>'Simple HTML and CSS for your views'],
    ['id'=>8,'title'=>'Debugging Errors','body'=>'How to read and fix Laravel errors'],
    ['id'=>9,'title'=>'Git Commits','body'=>'Writing clean and meaningful commit messages'],
    ['id'=>10,'title'=>'Future Steps','body'=>'Moving from arrays to database and models'],
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

Route::get('/posts/{id}', function ($id) {
    $posts = [
    ['id'=>1,'title'=>'Learn Laravel Basics','body'=>'Introduction to routing and views in Laravel'],
    ['id'=>2,'title'=>'Blade Templates','body'=>'Understanding how Blade works in Laravel'],
    ['id'=>3,'title'=>'Forms in Laravel','body'=>'Handling form submissions and CSRF protection'],
    ['id'=>4,'title'=>'Working with Arrays','body'=>'Using arrays instead of database for practice'],
    ['id'=>5,'title'=>'Laravel Routing','body'=>'Defining routes and passing parameters'],
    ['id'=>6,'title'=>'Show Single Post','body'=>'Displaying one post using dynamic routes'],
    ['id'=>7,'title'=>'Frontend Basics','body'=>'Simple HTML and CSS for your views'],
    ['id'=>8,'title'=>'Debugging Errors','body'=>'How to read and fix Laravel errors'],
    ['id'=>9,'title'=>'Git Commits','body'=>'Writing clean and meaningful commit messages'],
    ['id'=>10,'title'=>'Future Steps','body'=>'Moving from arrays to database and models'],
];
    $post=null;

    foreach($posts as $p){
        if($p['id']==$id){
            $post=$p;
            break;
        }
    }
    return view('posts.show',compact('post'));
});