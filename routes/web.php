<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\Mail\MensagemTesteMailController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('tarefas', TarefaController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mensagem-teste', function(){
    // return New MensagemTesteMail();
    Mail::to('sergiolimasilva12@gmail.com')->send(new MensagemTesteMail());
    Return "Email enviado com sucesso!";
});
