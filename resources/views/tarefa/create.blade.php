@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adicionar tarefa</div>

                    <div class="card-body">
                        <form action="{{ route('tarefas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tarefa</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="tarefa">
                            </div>
                            @error('tarefa')
                                {{ $message }}
                            @enderror
                            <div class="mb-3">
                                <label class="form-label">Data</label>
                                <input type="date" class="form-control" name="data_limite_conclusão">
                            </div>
                            @error('data_limite_conclusão')
                                <span>{{ $message }}</span>
                            @enderror

                            <div class="centralizar">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <a href="{{ route('tarefas.index') }}" class="btn btn-primary">Verificar tarefas</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection