<?php

use App\Http\Controllers\BusesController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

/* Galery */
    Route::get('/galery',
        [GaleryController::class, 'index']
    )->name('galery');

/* Buses */
Route::prefix('buses')->group(function () {
    Route::get('/',
        [BusesController::class, 'index']
    )->name('buses-list');

    Route::get('/history',
        [BusesController::class, 'history']
    )->name('buses-history');

    Route::get('/trash',
        [BusesController::class, 'trash']
    )->name('buses-trash');

    Route::get('/create',
        [BusesController::class, 'create']
    )->name('buses-create');

    Route::post('/store',
        [BusesController::class, 'store']
    )->name('buses-store');

    Route::get('/edit/{bus}',
        [BusesController::class, 'edit']
    )->name('buses-edit');

    Route::put('/update/{bus}',
        [BusesController::class, 'update']
    )->name('buses-update');

    Route::get('/search',
        [BusesController::class, 'search']
    )->name('buses-search');

    Route::delete('/delete/{bus}',
        [BusesController::class, 'destroy']
    )->name('buses-delete');

    Route::get('/{bus}',
        [BusesController::class, 'show']
    )->name('buses-show');
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
