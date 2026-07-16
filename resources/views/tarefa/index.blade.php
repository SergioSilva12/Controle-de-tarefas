@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Olá, {{$nome}}!</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Data limite conclusão</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                    <th scope="col">Concluir</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($quantidade > 0)
                                    @foreach ($tarefas as $tarefa)
                                        <tr>
                                            <th scope="row">{{$tarefa->id}}</th>
                                            <td>{{$tarefa->tarefa}}</td>
                                            <td>{{ date('d/m/Y', strtotime($tarefa->{'data_limite_conclusão'})) }}</td>
                                            <td><a href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a></td>
                                            <th>
                                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="post"
                                                    id="form_{{ $tarefa->id }}">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                                <a href="#"
                                                    onclick="document.getElementById('form_{{ $tarefa->id }}').submit()">Excluir</a>
                                            </th>
                                            <td>

                                                <form action="{{ route('tarefas.concluir', $tarefa) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" >Concluir</button>
                                                </form>
                                            </td>
                                            <td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Nenhuma tarefa encontrada!</strong> Você ainda não possui tarefas pendentes.
                                            Que tal criar uma nova?
                                        </div>
                                    </tr>

                                    <a href="{{ route('tarefas.create') }}" class="d-inline p-2 bg-primary text-white">Crie uma
                                        tarefa</a>
                                @endif

                                @session('sucesso')
                                    <span>Tarefa deletada com sucesso</span>
                                @endsession

                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Previus</a>
                                    {{-- metodo de voltar a página --}}
                                </li>
                                @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    {{-- For para o número de páginas se dinamico, ele verifica com base na última página --}}
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                        {{-- usei o currentPage para se estiver na página do numero $i, usar o 'active' para
                                        deixar destacado qual página estamos --}}
                                        <a class="page-link" href="{{ $tarefas->url($i) }}">{{$i}}</a>
                                    </li>
                                @endfor
                                <a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Next</a>
                                {{-- o metodo de próxima página --}}
                                </li>
                            </ul>
                        </nav>
                        <a href="{{ route('tarefas.create') }}" class="btn btn-primary">Crie uma tarefa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection