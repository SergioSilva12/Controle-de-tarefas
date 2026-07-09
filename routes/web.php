<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('tarefas', TarefaController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
