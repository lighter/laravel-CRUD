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

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('nerds', 'NerdController');

// get the cuteness level of a puppy
Route::get('puppies/{cutelevel}', function($cutelevel)
{
  return 'This puppy is an absolute ' . $cutelevel . ' out of ' . $cutelevel;
});

// OR

// get the parameter of name
Route::get('users/{name}', function($name)
{
  return 'User Name is ' . $name;
});

// optional category
Route::get('gallery/{category?}', function($category = 'sunset')
{
  // if category is set, show the category
  // if not, then show all
  if ($category)
    return 'This is the ' . $category . ' section.';
  else
    return 'These are all the photos.';
});
