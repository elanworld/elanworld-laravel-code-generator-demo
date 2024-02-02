<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::group([
    'prefix' => 'posts',
], function () {
    Route::get('/', [PostsController::class, 'index'])
         ->name('posts.posts.index');
    Route::get('/create', [PostsController::class, 'create'])
         ->name('posts.posts.create');
    Route::get('/show/{posts}',[PostsController::class, 'show'])
         ->name('posts.posts.show');
    Route::get('/{posts}/edit',[PostsController::class, 'edit'])
         ->name('posts.posts.edit');
    Route::post('/', [PostsController::class, 'store'])
         ->name('posts.posts.store');
    Route::put('posts/{posts}', [PostsController::class, 'update'])
         ->name('posts.posts.update');
    Route::delete('/posts/{posts}',[PostsController::class, 'destroy'])
         ->name('posts.posts.destroy');
});
