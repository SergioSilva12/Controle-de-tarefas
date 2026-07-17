@extends('layouts.app')

@section('content')

    <section>
        <div class="centro">

            <span class="gratis"><img src="{{ asset('img/gratuito.svg') }}" alt="">Totalmente gratuito</span>

            <div class="responsivo">
                <h2 class="fluxo">Suas tarefas em <span class="destaque">fluxo</span>, do início ao concluído.</h2>
                <span class="organize">Organize prazos, acompanhe o andamento e marque como concluído sem planilhas soltas
                    ou post-its
                    perdidos.</span>
            </div>

            <span class="ok">✓ Sem cartão de crédito </span>
            <span class="ok">✓ Configuração em 1 minuto</span>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded-3 mb-3"
                                style="width:44px; height:44px;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M3 21L3.75 17.5L15.5 5.75C16.05 5.2 16.95 5.2 17.5 5.75L18.25 6.5C18.8 7.05 18.8 7.95 18.25 8.5L6.5 20.25L3 21Z"
                                        stroke="#0d6efd" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h5 class="card-title fw-bold">Crie em segundos</h5>
                            <p class="card-text text-secondary">Adicione uma tarefa com título e data limite, sem
                                formulários complicados no caminho.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded-3 mb-3"
                                style="width:44px; height:44px;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="8.5" stroke="#f59e0b" stroke-width="1.6" />
                                    <path d="M12 7V12L15 14.5" stroke="#f59e0b" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h5 class="card-title fw-bold">Nunca perca um prazo</h5>
                            <p class="card-text text-secondary">Veja de forma clara o que vence primeiro e priorize o que
                                realmente importa hoje.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded-3 mb-3"
                                style="width:44px; height:44px;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="8.5" stroke="#16a34a" stroke-width="1.6" />
                                    <path d="M8.5 12.3L10.75 14.5L15.5 9.5" stroke="#16a34a" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h5 class="card-title fw-bold">Conclua com um clique</h5>
                            <p class="card-text text-secondary">Marque como feito e acompanhe seu progresso sem precisar
                                reorganizar nada manualmente.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        @if(auth()->check())
            <div class="btn-tarefas">
                <a href="{{ route('tarefas.create') }}" class="btn btn-primary">Criar uma tarefa</a>
                <a href="{{ route('tarefas.index') }}" class="btn btn-primary"> Ver minhas tarefas</a>
            </div>
        @else
            <div class="btn-tarefas">
                <a href="{{ route('login') }}" class="btn btn-primary">Criar uma tarefa</a>
                <a href="{{ route('login') }}" class="btn btn-primary"> Ver minhas tarefas</a>
            </div>
        @endif

    </section>

@endsection