<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('landing');
});


Route::get('/survey/themes', function() {
   return view('survey.themes');
});

Route::get('survey/styleguide', function() {
    return view('survey.styleguide');
});

// will refactor in it's own controller (maybe)
Route::get('currentwork', function() {
  return view('work');
});

Route::get('/projects', 'ProjectRequestController@index');
Route::get('/project-request', [
    'uses' => 'ProjectRequestController@create',
    'as'   => 'create-project-request'
]);

Route::post('/project-request', [
    'uses' => 'ProjectRequestController@store',
    'as'   => 'project-request'
         
]);