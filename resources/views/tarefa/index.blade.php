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

                                </tr>
                            </thead>

                            <tbody>
                                @if($quantidade > 0)
                                    @foreach ($tarefas as $tarefa)
                                        <tr>
                                            <th scope="row">{{$tarefa->id}}</th>
                                            <td>{{$tarefa->tarefa}}</td>
                                            <td>{{ date('d/m/Y', strtotime($tarefa->{'data_limite_conclusão'})) }}</td>
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


                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Previus</a>
                                </li>
                                @for ($i = 1;$i<=$tarefas->lastPage();$i++)
                                <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $tarefas->url($i) }}">{{$i}}</a>
                                </li>
                                @endfor
                                    <a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Next</a>
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