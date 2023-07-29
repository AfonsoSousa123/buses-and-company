<?php

use App\Http\Controllers\BusesController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [MainController::class, 'index'])->name('main');

Auth::routes();

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    /* Galery */
    Route::prefix('galery')->group(function () {
    Route::get('/',
        [GaleryController::class, 'index']
    )->name('galery');

    Route::get('/list',
        [GaleryController::class, 'list']
    )->name('image-list');

    Route::get('/search',
        [GaleryController::class, 'search']
    )->name('image-search');

    Route::get('/history',
        [GaleryController::class, 'history']
    )->name('image-history');

    Route::get('/trash',
        [GaleryController::class, 'trash']
    )->name('image-trash');

    Route::post('/store',
        [GaleryController::class, 'store']
    )->name('image-store');

    Route::get('/edit/{image}',
        [GaleryController::class, 'edit']
    )->name('image-edit');

    Route::put('/update/{image}',
        [GaleryController::class, 'update']
    )->name('image-update');

    Route::delete('/delete/{image}',
        [GaleryController::class, 'destroy']
    )->name('image-delete');

    Route::get('/{image}',
        [GaleryController::class, 'show']
    )->name('image-show');
});

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
    Route::prefix('feed')->group(function () {
        Route::get('/',
            [PostsController::class, 'index']
        )->name('posts-feed');

        Route::get('/search',
            [PostsController::class, 'search']
        )->name('posts-search');

        Route::get('/{post}',
            [PostsController::class, 'show']
        )->name('posts-show');

        Route::get('/create',
            [PostsController::class, 'create']
        )->name('posts-create');

        Route::post('/store',
            [PostsController::class, 'store']
        )->name('posts-store');

        Route::get('/edit/{post}',
            [PostsController::class, 'edit']
        )->name('posts-edit');

        Route::put('/update/{post}',
            [PostsController::class, 'update']
        )->name('posts-update');

        Route::delete('/{post}',
            [PostsController::class, 'destroy']
        )->name('posts-delete');

        Route::get('/trash',
            [PostsController::class, 'trash']
        )->name('posts-trash');

        Route::post('/{post}',
            [PostsController::class, 'restore']
        )->name('posts-restore');

//    //Comments
//    Route::post('/{post}', [
//        'as' => 'comment-store',
//        'uses' => 'CommentsController@store'
//    ]);
//    Route::get('/{post}/{comment}', [
//        'as' => 'comment-delete',
//        'uses' => 'CommentsController@destroy'
//    ]);
    });
});
