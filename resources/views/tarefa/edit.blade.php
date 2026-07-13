@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Atualizar tarefa</div>

                    <div class="card-body">
                        <form action="{{ route('tarefas.update',['tarefa'=>$tarefa->id ]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Tarefa</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="tarefa" value="{{ $tarefa->tarefa }}">
                            </div>
                            @error('tarefa')
                                {{ $message }}
                            @enderror
                            <div class="mb-3">
                                <label class="form-label">Data</label>
                                <input type="date" class="form-control" name="data_limite_conclusão" value="{{ $tarefa->data_limite_conclusão }}">
                            </div>
                            @error('data_limite_conclusão')
                                {{ $message }}
                            @enderror
                            <button type="submit" class="btn btn-primary ">Cadastrar</button>
                        </form>
                        <a href="{{ route('tarefas.index') }}" class="btn btn-primary d-flex justify-content-center" >Voltar</a>
                        @session('sucesso')
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    Tarefa cadastrada com sucesso
                                </div>
                            </div>
                        @endsession
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection