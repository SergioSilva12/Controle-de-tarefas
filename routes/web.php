<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\Mail\MensagemTesteMailController;

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify'=> true]);

Route::patch('tarefas/{tarefa}/concluir',[
    TarefaController::class, 'concluir'
])->name('tarefas.concluir')->middleware('verified');


Route::resource('tarefas', TarefaController::class)->middleware('verified');

Route::get('/mensagem-teste', function(){
    // return New MensagemTesteMail();
    Mail::to('sergiolimasilva12@gmail.com')->send(new MensagemTesteMail());
    Return "Email enviado com sucesso!";
});
