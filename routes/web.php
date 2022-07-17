<?php
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
})
;

Route::get('/db', function () {
    try {
        \DB::connection()->getPDO();
        echo \DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        echo 'None';
    }
});

Route::get('/posts',[MainController::class,'posts'])->name('posts');
Route::get('/create',[MainController::class,'create']);
Route::post('/post_create',[MainController::class,'post_create']);
Route::get('/edit/{id}',[MainController::class,'edit'])->name('edit-one');
Route::post('/edit/{id}',[MainController::class,'update'])->name('post-update');
Route::get('/delete/{id}',[MainController::class,'delete'])->name('post-delete');
