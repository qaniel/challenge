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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//POST ROUTES
Route::get('/entry', 'EntryController@showEntryForm')
    ->middleware('auth')->name('showEntryForm');
Route::get('/entry/edit/{entry}', 'EntryController@showEditEntryForm')
    ->middleware('auth')->name('showEditForm');
Route::post('/entry/update/{entry}', 'EntryController@updateEntry')
    ->middleware('auth')->name('updateEntry');
Route::post('/entry/create', 'EntryController@createEntry')
    ->middleware('auth')->name('createEntry');
//END POST ROUTES
