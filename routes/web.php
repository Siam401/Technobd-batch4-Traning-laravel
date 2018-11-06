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


Route::get('/', 'PublicController@index');
Route::get('/single/{post}', 'PublicController@singlePage')->name('singlePage');
Route::get('/category/{category}', 'PublicController@listPage')->name('listPage');
Route::get('/tag/{tag}', 'PublicController@listPage')->name('listPageTag');
Route::post('/content/{id}', 'CommentController')->name('comment');
Route::get('/video', 'PublicController@videoPage')->name('videoPage');
Route::get('/video/{video}', 'PublicController@videoDetails')->name('videoDetails');


//Route::group(['middleware' => ['CheckCountry']], function () {
Route::get('/admin', function () {
        return view('backend.home');
    });
//});

//Route::get('/about', function () {
////    echo 'About Page';
//    return view('about');
//});

//Route::get('/categories', function () {
////    echo 'About Page';
//    return view('categories.categories');
//});


//Route::get('/categories/{data}', function ($id) {
////    echo 'About Page';
//    return view('categories.show', compact('id'));
//});

Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
Route::get('/categories/trash/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::delete('/categories/trash/{id}/delete', 'CategoryController@delete')->name('categories.delete');
Route::resource('/categories', 'CategoryController');
Route::resource('/videos', 'VideoController');

Route::resource('/posts', 'PostController');
Route::resource('/tags', 'TagController');

//Route::get('/categories', 'CategoryController@index')->name('categories.index');
//Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
//Route::post('/categories', 'CategoryController@store')->name('categories.store');
//Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
//Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');
//Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
//Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/{user}/profile', 'ShowProfile')->name('users.profile');
