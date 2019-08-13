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

/* =========== Catergory routes =========== */
Route::get('admin/category', 'CategoryController@index')->name('admin.category');
Route::get('admin/category/create', 'CategoryController@create')->name('admin.category.create');
Route::post('admin/category/store', 'CategoryController@store')->name('admin.category.store');
Route::delete('admin/category/{category}', 'CategoryController@destroy')->name('admin.category.delete');
Route::get('admin/category/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');
Route::patch('admin/category/{category}', 'CategoryController@update')->name('admin.category.update');


/* =========== Posts routes =========== */
Route::get('admin/post', 'PostController@index')->name('admin.post');
Route::get('admin/post/create', 'PostController@create')->name('admin.post.create');
Route::post('admin/post/store', 'PostController@store')->name('admin.post.store');
Route::delete('admin/post/{post}', 'PostController@destroy')->name('admin.post.delete');
Route::get('admin/post/{post}/edit', 'PostController@edit')->name('admin.post.edit');
Route::patch('admin/post/{post}', 'PostController@update')->name('admin.post.update');
