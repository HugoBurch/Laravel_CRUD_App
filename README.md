# CRUD de Produtos

Aplicação web para cadastro e manutenção de produtos, fornecedores e usuários, desenvolvida com Laravel. A interface é renderizada com Blade e usa Bootstrap.

## Funcionalidades

- **Produtos:** cadastrar, listar, editar e excluir; cada produto possui nome, descrição, preço e quantidade.
- **Fornecedores:** cadastrar, listar, editar e excluir; a listagem permite pesquisar por nome, site, UF ou e-mail e exibe 10 registros por página.
- **Usuários:** cadastrar, listar, editar, excluir e redefinir senha. Os usuários podem receber uma das permissões identificadas como `Admin`, `Normal` ou `Leitura`.

> O campo de permissão é armazenado e gerenciado no cadastro de usuários. No estado atual do projeto, não há fluxo de autenticação nem aplicação dessas permissões para restringir o acesso às páginas.

## Tecnologias

- PHP 8.2 ou superior
- Laravel 12
- SQLite (banco de dados padrão)
- Node.js e npm, para compilar os assets
- Bootstrap, jQuery e Blade

## Instalação no Windows

Pré-requisitos: PHP com as extensões necessárias ao Laravel e ao SQLite, Composer, Node.js e npm.

No PowerShell, na pasta do projeto:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate

if (!(Test-Path database\database.sqlite)) {
    New-Item -ItemType File -Path database\database.sqlite
}

php artisan migrate
npm install
npm run build
```

O arquivo `.env.example` já configura o SQLite como banco padrão. Se usar outro banco, ajuste as variáveis `DB_*` no `.env` antes de executar as migrações.

## Executar

Inicie o servidor local:

```powershell
php artisan serve
```

Acesse [http://localhost:8000](http://localhost:8000). Para recompilar os assets automaticamente durante o desenvolvimento, execute também, em outro terminal:

```powershell
npm run dev
```

## Testes

Execute a suíte de testes Laravel com:

```powershell
php artisan test
```
