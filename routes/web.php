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

/* Main Page */
Route::get('/home', 'HomeController@index')->name('home');

/* Users */ 
Route::prefix('admin')->group(function () {
    Route::get('/login/maintenance', [
        'as' => 'maintenance',
        'uses' => 'AdminController@index'
    ]);
    Route::get('/login', [
        'as' => 'admin.login',
        'uses' => 'Auth\AdminLoginController@showLoginForm'
    ]);
    Route::post('/login', [
        'as' => 'admin.login.submit',
        'uses' => 'Auth\AdminLoginController@login'
    ]);
    Route::get('/{user}', [
        'as' => 'users-delete',
        'uses' => 'AdminController@destroy'
    ]);
});

/* Galery */
Route::get('/galery', 'GaleryController@index');


/* Buses */
Route::prefix('buses')->group(function () {
    Route::get('/', [
        'as' => 'buses',
        'uses' => 'BusesController@index'
    ]);
    Route::get('/create', [
        'as' => 'buses-create',
        'uses' => 'BusesController@create'
    ]);
    Route::post('/store', [
        'as' => 'buses-store',
        'uses' => 'BusesController@store'
    ]);
    Route::get('/edit/{bus}', [
        'as' => 'buses-edit',
        'uses' => 'BusesController@edit'
    ]);
    Route::put('/update/{bus}', [
        'as' => 'buses-update',
        'uses' => 'BusesController@update'
    ]);
    Route::post('/search', [
        'as' => 'buses-search',
        'uses' => 'BusesController@search'
    ]);
    Route::get('/delete/{bus}', [
        'as' => 'buses-delete',
        'uses' => 'BusesController@destroy'
    ]);
    Route::get('/{bus}', [
        'as' => 'buses-show',
        'uses' => 'BusesController@show'
    ]);
});


/* Posts */
Route::prefix('posts')->group(function () {
    Route::get('/', [
        'as' => 'posts',
        'uses' => 'PostsController@index'
    ]);
    Route::get('/create', [
        'as' => 'posts-create',
        'uses' => 'PostsController@create'
    ]);
    Route::post('/store', [
        'as' => 'posts-store',
        'uses' => 'PostsController@store'
    ]);
    Route::get('/edit/{post}', [
        'as' => 'posts-edit',
        'uses' => 'PostsController@edit'
    ]);
    Route::put('/update/{post}', [
        'as' => 'posts-update',
        'uses' => 'PostsController@update'
    ]);
    Route::post('/search', [
        'as' => 'posts-search',
        'uses' => 'PostsController@postSearch'
    ]);
    Route::get('/delete/{post}', [
        'as' => 'posts-delete',
        'uses' => 'PostsController@destroy'
    ]);
    Route::get('/{post}', [
        'as' => 'posts-show',
        'uses' => 'PostsController@show'
    ]);

    //Comments
    Route::post('/{post}', [
        'as' => 'comment-store',
        'uses' => 'CommentsController@store'
    ]);
    Route::get('/{post}/{comment}', [
        'as' => 'comment-delete',
        'uses' => 'CommentsController@destroy'
    ]);
});
/**/
