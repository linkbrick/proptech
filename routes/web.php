<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::group(['prefix' => 'projects'], function () {
    Route::get('/', function () {
        return view('pages.projects');
    })->name('projects');

    Route::get('/millerz-square', function () {
        return view('projects.millerz_square');
    })->name('millerz');

});


Auth::routes();


// login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('maintenance/projects', 'Maintenance\ProjectController');

});

