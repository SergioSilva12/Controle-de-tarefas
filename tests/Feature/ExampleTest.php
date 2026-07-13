<?php

namespace Tests\Feature;

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_tarefa_show_route_displays_the_task(): void
    {
        $tarefa = Tarefa::create([
            'tarefa' => 'Estudar Laravel',
            'data_limite_conclusão' => '2026-07-20',
        ]);

        $response = $this->get(route('tarefas.show', $tarefa));

        $response->assertStatus(200);
        $response->assertSee($tarefa->tarefa);
    }
}
