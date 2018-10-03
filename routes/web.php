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

Route::get('/admin', function () {
    return view('backend.home');
});


Route::get('/', function () {
    return view('index');
});

Route::get('/single', function () {
    return view('frontend.pages.single');
});

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

Route::resource('/categories', 'CategoryController');
//Route::resource('/post', 'PostController');

//Route::get('/categories', 'CategoryController@index')->name('categories.index');
//Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
//Route::post('/categories', 'CategoryController@store')->name('categories.store');
//Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
//Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');
//Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
//Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');
