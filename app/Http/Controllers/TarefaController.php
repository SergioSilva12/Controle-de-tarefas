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
        if (auth()->check()) { //verifica se o usuário está logado
            $nome = auth()->user()->name; //recupera o nome do usário
            $tarefas = Tarefa::where('concluido',false)->get(); //recupera os dados cujo as tarefas não estejam concluidas
            $quantidade = $tarefas->count();//conta quantas tarefas tem não conluidas
            return view('tarefa.index', ['tarefas' => $tarefas,'nome'=>$nome,'quantidade'=>$quantidade]);//retorna os valores para a view
        } else {
            return redirect()->route('login');
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
            'tarefa' => 'required|min:4',
            'data_limite_conclusão' => 'required'
        ], [
            'tarefa.required' => 'Por favor, digite a tarefa',
            'tarefa.min' => 'A tarefa tem que ter no mínimo 4 caracteres',
            'data_limite_conclusão.required' => 'Por favor, coloque a data de conclusão'
        ]);

        $tarefa = Tarefa::create([
            'user_id' => $request->id,
            'tarefa' => $request->tarefa,
            'data_limite_conclusão' => $request->data_limite_conclusão,
            'concluido' =>$request->boolean()
        ]);

        return redirect()->route('tarefas.show', $tarefa)->with('sucesso', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
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
