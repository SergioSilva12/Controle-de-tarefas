<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->check()) { //verifica se o usuário está logado
            $nome = auth()->user()->name; //recupera o nome do usário
            $tarefas = Tarefa::where('concluido', false)
                ->where('user_id', auth()->id())
                ->paginate(5); //recupera os dados cujo as tarefas não estejam concluidas para o usuário atual
            $quantidade = $tarefas->count();//conta quantas tarefas tem não conluidas
            return view('tarefa.index', ['tarefas' => $tarefas, 'nome' => $nome, 'quantidade' => $quantidade]);//retorna os valores para a view
        } else {
            return redirect()->route('login');
        }

    }

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
            'user_id' => auth()->id(),
            'tarefa' => $request->tarefa,
            'data_limite_conclusão' => $request->data_limite_conclusão,
            'concluido' => $request->boolean()
        ]);

        return redirect()->route('tarefas.show', $tarefa)->with('sucesso', true);
    }


    public function show(Tarefa $tarefa)
    {

        return view('tarefa.show', ['tarefa' => $tarefa]);
    }


    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if ($tarefa->user_id == $user_id) { //Validação para o usuário não acessar outras tarefas que não está relacionado ao usuário
            return view('tarefa.edit', ['tarefa' => $tarefa]);
        }

        return view('acesso-negado');
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $user_id = auth()->user()->id; //verificando se a tarefa afetada é uma tarefa do usuário
        if ($tarefa->id == $user_id) {
            $tarefa->update([
                'tarefa' => $request->tarefa,
                'data_limite_conclusão' => $request->data_limite_conclusão
            ]);
            return redirect()->route('tarefas.index', ['tarefa' => $tarefa->id]);
        }

        return view('acesso-negado');

    }

    public function destroy(Tarefa $tarefa)
    {
        if ($tarefa->user_id == auth()->user()->id) {
            $tarefa->delete();
            return redirect()->route('tarefas.index')->with('sucesso', true);
        } else {
            return view('acesso-negado');
        }


    }
    public function concluir(Tarefa $tarefa){
        if($tarefa->user_id == auth()->user()->id){
            $tarefa->concluido = true;
            $tarefa->save();
            return redirect()->route('tarefas.index')->with('concluido',true);
        }
        else{
            return view('acesso-negado');
        }
    }
}
