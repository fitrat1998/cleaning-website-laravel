<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;


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

Route::get('/',[PageController::class , 'main'])->name('/');

Route::get('/about',[PageController::class ,'about'])->name('about');

Route::get('/services',[PageController::class ,'services'])->name('services');

Route::get('/projects',[PageController::class ,'projects'])->name('projects');

Route::get('/contact',[PageController::class ,'contact'])->name('contact');

Route::get('/login',[AuthController::class ,'login'])->name('login');

Route::post('authenticate',[AuthController::class ,'authenticate'])->name('authenticate');

Route::post('logout',[AuthController::class ,'logout'])->name('logout');

Route::get('/register',[AuthController::class ,'register'])->name('register');

Route::post('register',[AuthController::class ,'register_store'])->name('register.store');

Route::resources([
	'posts'=> PostController::class,
	'comments' => CommentController::class,
]);

// Route::get('/posts',[PostController::class ,'index'])->name('posts.index');
// Route::get('/posts/{post}',[PostController::class ,'show'])->name('posts.show');
// Route::get('/posts/create',[PostController::class ,'create'])->name('posts.create');
// Route::post('/posts/create',[PostController::class ,'store'])->name('posts.store');
// Route::get('/posts/{post}/edit',[PostController::class ,'edit'])->name('posts.edit');
// Route::put('/posts/{post}/edit',[PostController::class ,'update'])->name('posts.update');
// Route::delete('/posts/{post}/delete',[PostController::class ,'delete'])->name('posts.delete');





