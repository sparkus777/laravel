<?php
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/',[MainController::class,'posts'])->name('posts');
Route::get('/post/create',[MainController::class,'create'])->name('create');
Route::post('/post/store',[MainController::class,'store'])->name('store');
Route::get('/edit/{id}',[MainController::class,'edit'])->name('edit');
Route::post('/update/{id}',[MainController::class,'update'])->name('update');
Route::get('/delete/{id}',[MainController::class,'delete'])->name('delete');
