<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->check()){
            $nome = auth()->user()->name;
            return "Você está logado, $nome! Pode acessar esta página.";
        }
        else{
            redirect ()->route('login');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefa.create');
    }

    
    public function store(Request $request)
    {   
        $request->validate([
            'tarefa'=>'required|min:4',
            'data_limite_conclusão' => 'required'
        ],[
            'tarefa.required'=>'Por favor, digite a tarefa',
            'tarefa.min'=>'A tarefa tem que ter no mínimo 4 caracteres',
            'data_limite_conclusão.required'=>'Por favor, coloque a data de conclusão'
        ]);

        Tarefa::create(['tarefa'=>$request->tarefa,'data_limite_conclusão' =>$request->data_limite_conclusão]);

        return redirect()->route('tarefas.create')->With('sucesso','Tarefa cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
