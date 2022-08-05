<?php
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/',[MainController::class,'main_page'])->name('main_page');
Route::get('/private',[MainController::class,'posts'])->name('posts')->middleware('auth');
Route::get('/post/create',[MainController::class,'create'])->name('create')->middleware('auth');;
Route::post('/post/store',[MainController::class,'store'])->name('store')->middleware('auth');;
Route::get('/edit/{id}',[MainController::class,'edit'])->name('edit')->middleware('auth');;
Route::post('/update/{id}',[MainController::class,'update'])->name('update')->middleware('auth');;
Route::get('/delete/{id}',[MainController::class,'delete'])->name('delete')->middleware('auth');;
Route::get('/registration_page',[MainController::class,'reg_page'])->name('reg_page');
Route::get('/authorization_page',[MainController::class,'auth_page'])->name('auth_page');
Route::post('/registration',[\App\Http\Controllers\RegisterController::class,'save'])->name('registration');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::get('/logout',[MainController::class,'logout'])->name('logout');

