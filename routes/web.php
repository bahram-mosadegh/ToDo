<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;

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

// Route::middleware('auth')->group(function(){

Route::resource('/todo',TodoController::class);
// Route::get('/todos', [TodoController::class, 'index'])->name('todo.index');
// Route::get('/todos/create', [TodoController::class, 'create']);
// Route::post('/todos/create', [TodoController::class, 'store']);
// Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
// Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');
Route::put('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
Route::delete('/todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todo.incomplete');
// Route::delete('/todos/{todo}/delete', [TodoController::class, 'delete'])->name('todo.delete');

// });



Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::post('/upload',[UserController::class, 'UploadAvatar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
