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
                                    <th scope="col">Data limite</th>
                                    <th scope="col" class="centro-tarefas">Editar</th>
                                    <th scope="col" class="centro-tarefas">Excluir</th>
                                    <th scope="col" class="centro-tarefas">Concluir</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($quantidade > 0)
                                    @foreach ($tarefas as $tarefa)
                                        <tr>
                                            <th scope="row">{{$tarefa->id}}</th>
                                            <td>{{$tarefa->tarefa}}</td>
                                            <td>{{ date('d/m/Y', strtotime($tarefa->{'data_limite_conclusão'})) }}</td>
                                            <td><a href="{{ route('tarefas.edit', $tarefa->id) }}" class="links"><img
                                                        src="{{ asset('img/editar.svg') }}" alt=""></a></td>
                                            <th>
                                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="post"
                                                    id="form_{{ $tarefa->id }}">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                                <a href="#" onclick="document.getElementById('form_{{ $tarefa->id }}').submit()"
                                                    class="links"><img src="{{ asset('img/excluir.svg') }}" alt=""></a>
                                            </th>
                                            <td>

                                                <form action="{{ route('tarefas.concluir', $tarefa) }}" method="post"
                                                    id="form__{{ $tarefa->id }}">
                                                    @csrf
                                                    @method('PATCH')

                                                </form>
                                                <a href="#" onclick="document.getElementById('form__{{ $tarefa->id }}').submit()"
                                                    class="links"><img src="{{ asset('img/concluir.svg') }}" alt=""></a>
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

                                @endif



                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Anterior</a>
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
                                <a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Próximo</a>
                                {{-- o metodo de próxima página --}}
                                </li>
                            </ul>
                        </nav>
                        <a href="{{ route('tarefas.create') }}" class="btn btn-primary">Crie uma tarefa</a>
                        @if(session('concluido'))
                        <span class="alerta-mensagem">Tarefa concluída com sucesso</span>
                        @endif
                        @if(session('sucesso'))
                            <span class="alerta-mensagem">Tarefa deletada com sucesso</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection