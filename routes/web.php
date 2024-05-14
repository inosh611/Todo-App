<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\todoController;

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

Route::get('/',[HomeController::class,'index'])->name('home');

//Todo


Route::prefix('/todo')->group(function(){
    Route::get('/',[todoController::class,'index'])->name('todo');
    Route::post('/store',[todoController::class,'store'])->name('todo.store');
    Route::get('/{task_id}/delete',[todoController::class,'delete'])->name('todo.delete');
    Route::get('/{task_id}/done',[todoController::class,'done'])->name('todo.done');
    Route::GET('/edit',[todoController::class,'edit'])->name('todo.edit');
    Route::post('/{task_id}/update',[todoController::class,'update'])->name('todo.update');
    Route::get('/{task_id}/sub',[todoController::class,'sub'])->name('todo.sub');
    Route::post('/sub/store',[todoController::class,'subStore'])->name('todo.sub.store');


});
