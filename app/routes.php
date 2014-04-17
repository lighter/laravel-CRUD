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

Route::get('nerd/edit/{id}', array('as' => 'nerd.edit', function($id)
{
  // return our view and Nerd information
  return View::make('nerd-edit') // pulls app/views/nerd-edit.blade.php
    ->with('nerd', Nerd::find($id));
}));

Route::post('nerd/edit', function(){

});