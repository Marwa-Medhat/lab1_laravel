<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/test', function () {
    return view('test');
});


Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destory'])->name('posts.destory')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
//show 3shan twreni post post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
// Route::get('/test', 'TestController@testAction'); old syntax
//edit
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');

//Update
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');


Route::get('/posts/ajax/show', [PostController::class, 'ajaxShow'])->name('posts.ajax.show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('posts/check_slug', 'PostsController@checkSlug')->name('posts.checkSlug');





Route::get('/auth/redirect', function () {
    // dd('here');
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    // dd($user);
    // Socialite::driver('github')->stateless()->redirect();
    //check user exist or not and save in database
    // $user->token
    return redirect()->route('posts.index');

});