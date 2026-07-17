**AppControleTarefas**

Gerenciador simples de tarefas desenvolvido com Laravel. Este projeto serve como base para controlar tarefas, usuários e notificações por e-mail.

**Tecnologias:** PHP, Laravel, Composer, MySQL (ou outro SGBD compatível), Node.js, Vite

**Status:** Em desenvolvimento

**Sumário**
- **Descrição**: visão geral do projeto
- **Requisitos**: dependências e versões mínimas
- **Instalação**: passos para rodar localmente
- **Uso**: comandos principais e exemplos
- **Testes**: como executar a suíte de testes
- **Deploy**: notas de implantação
- **Contribuição**: como contribuir

**Descrição**
AppControleTarefas é um sistema de gerenciamento de tarefas com autenticação, relacionamento entre tarefas e usuários, envio de e-mails (notificações), e operações CRUD para tarefas.

**Principais funcionalidades**
- Cadastro e autenticação de usuários
- Criação, edição e exclusão de tarefas
- Associação de tarefas a usuários
- Notificações por e-mail (ex.: redefinição de senha, nova tarefa)

**Requisitos**
- PHP >= 8.1
- Composer
- Node.js >= 16 e npm/yarn
- MySQL/MariaDB ou outro SGBD compatível
- Extensões PHP comuns: mbstring, bcmath, openssl, pdo

**Instalação (local)**
1. Clone o repositório:

	```bash
	git clone https://seu-repositorio.git nome-do-projeto
	cd nome-do-projeto
	```

2. Instale dependências PHP e Node:

	```bash
	composer install
	npm install
	```

3. Copie o arquivo de ambiente e gere a chave da aplicação:

	```bash
	cp .env.example .env
	php artisan key:generate
	```

4. Configure as credenciais do banco de dados no arquivo `.env` e execute migrations:

	```bash
	php artisan migrate --seed
	```

5. Compile os assets (modo desenvolvimento):

	```bash
	npm run dev
	```

6. Inicie o servidor local:

	```bash
	php artisan serve
	```

O sistema ficará disponível por padrão em `http://127.0.0.1:8000`.

**Variáveis de ambiente importantes**
- `DB_*`: configuração do banco de dados
- `MAIL_*`: configuração do servidor SMTP para envio de e-mails
- `APP_ENV`, `APP_DEBUG`, `APP_URL`

**Uso — comandos úteis**
- Rodar testes:

  ```bash
  ./vendor/bin/phpunit
  ```

- Rodar migrations:

  ```bash
  php artisan migrate
  ```

- Criar usuário via tinker:

  ```bash
  php artisan tinker
  \App\Models\User::factory()->create(['email' => 'dev@example.com']);
  ```

**Estrutura principal**
- `app/Models`: modelos de domínio (`Tarefa`, `User`)
- `app/Http/Controllers`: controladores da aplicação
- `database/migrations`: migrations do banco
- `resources/views`: views Blade
- `routes/web.php`: rotas web

**Testes**
Execute a suíte de testes com:

```bash
./vendor/bin/phpunit
```

Adicione testes em `tests/Feature` e `tests/Unit` conforme necessário.

**Deploy**
- Configure o servidor com PHP-FPM + Nginx/Apache
- Defina as variáveis de ambiente em produção
- Execute `composer install --no-dev --optimize-autoloader` e `php artisan migrate --force`
- Rode `npm run build` para gerar assets otimizados

**Contribuição**
- Fork e PR com pequenas mudanças e descrições claras
- Siga PSR-12 e execute os testes antes de abrir PR

**Licença**
Projeto licenciado sob MIT — veja o arquivo LICENSE para detalhes.

**Contato**
- Para dúvidas ou suporte, abra uma issue neste repositório.

