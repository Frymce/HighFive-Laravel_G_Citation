<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;

use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'accueil']);
Route::get('/accueil', [PagesController::class, 'accueil']);
Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/citation', [CitationController::class, 'index']);
Route::get('/g-citation', [PagesController::class, 'g_citation'])->middleware('auth');



Route::get('/citation/create', [CitationController::class, 'create'])->middleware('auth');
Route::post('/citation/create', [CitationController::class, 'store'])->middleware('auth');

Route::get('/citation/{citation}/edit', [CitationController::class, 'edit'])->middleware('auth');
Route::patch('/citation/{citation}/edit', [CitationController::class, 'update'])->middleware('auth');
Route::delete('/citation/{citation}/delete', [CitationController::class, 'delete'])->middleware('auth');




Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('save')->middleware('guest');

Route::get('/login', [SessionsController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'authenticate'])->name('login')->middleware('guest');

Route::post('/logout',[SessionsController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/profile', [UserController::class, 'moi'])->name('profile')->middleware('auth');


Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::patch('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');


Route::post('/citation/{id}/like', [CitationController::class, 'like'])->name('like')->middleware('auth');
Route::post('/citation/{id}/unlike', [CitationController::class, 'unlike'])->name('unlike')->middleware('auth');
