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

                                    <a href="{{ route('tarefas.create') }}">Crie uma tarefa</a>
                                @endif


                            </tbody>
                        </table>
                        <a href="{{ route('tarefas.create') }}">Crie uma tarefa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection