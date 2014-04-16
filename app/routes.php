<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::resource('nerds', 'NerdController');

// Add new route
// app/views/home.blade.php
Route::get('/', function(){
  return View::make('home');
});

// app/views/about.blade.php
Route::get('about', function(){
  return View::make('about');
});

// app/views/work.blade.php
// I can use {{ URL::route('work') }} on the application views
// Above just use {{ URL::to('/') }} or {{ URL::to('about') }}
Route::get('work', array('as' => 'work', function(){
  return View::make('work');
}));

// Blog Pages with Categories Route Parameters
// BLOG PAGES
Route::get('blog/{category?}', function($category = null){
  // get all the blog stuff from database
  // if a category was passed, use that
  // if no category, get all posts
  if ($category)
    $posts = Post::where('category', '=', $category);
  else
    $posts = Post::all();

  return View::make('blog')
    ->with('posts', $posts);
});

// Login Section
//
  Route::get('login', function(){

    //app/views/login.blade.php
    return View::make('login');
  });

  Route::post('login', function(){
    // validate
    // process login
    // if successful, redirect
    return Redirect::intended();
  });


// Admin Section Group Routing, Route Prefixing, and Auth Filters
// Admin
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function(){

  // main page for the admin section app/views/admin/dashboard.blade.php
  Route::get('/', function(){
    return View::make('admin.dashboard');
  });

  // /admin/posts
  // app/views/admin/posts.blade.php
  Route::get('posts', function(){
    return View::make('admin.posts');
  });

  // admin/posts/create
  // app/views/admin/posts-create.blade.php
  Route::get('posts/create', function(){
    return View::make('admin.posts-create');
  });

  // process the create blog post form
  Route::post('posts/create', function(){

    // create a success message
    Session::flash('message', 'Successfully created post!');

    return Redirect::to('admin/posts/create');
  });

  // 404
  App::missing(function($exception){
    return Response::view('error', array(), 404);
  });

});