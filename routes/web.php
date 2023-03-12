<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/Register',[RegisterController::class,'index'])->name('register');
Route::post('/Register',[RegisterController::class,'store']);

//login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//Rutas para el perfil

Route::get('/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');


//user
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.muro');


//posts
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('posts.destroy');

//Imagen
Route::post('/imagen',[ImagenController::class,'store'])->name('imagenes.store');

//comentarios
Route::post('/{user:username}/post/{post}',[ComentarioController::class,'store'])->name('comentarios.store');

//Likes
Route::post('/posts/{post}/like',[LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/like',[LikeController::class,'destroy'])->name('posts.likes.destroy');

//followers
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');
