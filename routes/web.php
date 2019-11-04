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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//ENTRY ROUTES
Route::get('/entry/create', 'EntryController@showEntryForm')
    ->middleware('auth')->name('showEntryForm');

Route::get('/entry/edit/{entry}', 'EntryController@showEditEntryForm')
    ->middleware(['auth', 'restrictToOwner'])->name('showEditForm');

Route::post('/entry/update/{entry}', 'EntryController@updateEntry')
    ->middleware(['auth', 'restrictToOwner'])->name('updateEntry');

Route::post('/entry/create', 'EntryController@createEntry')
    ->middleware('auth')->name('createEntry');

Route::get('/entry/{entry}', 'EntryController@showEntry')->name('showEntry');
//END ENTRY ROUTES
