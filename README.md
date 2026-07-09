# Projeto Santa Casa

Sistema administrativo desenvolvido em Laravel como parte de um desafio técnico.

O sistema permite o gerenciamento de usuários, permissões e módulos administrativos, além de controlar o acesso de cada usuário de acordo com as permissões atribuídas.

# Tecnologias utilizadas

* PHP 8.2+
* Laravel 12
* MySQL
* Laravel Breeze
* Spatie Laravel Permission
* Blade
* Tailwind CSS
* Bootstrap

# Funcionalidades

O sistema possui:

- Login e logout de usuários
- Cadastro, edição e exclusão de usuários
- Cadastro, edição e exclusão de permissões
- Cadastro, edição e exclusão de:
  - Setores Hospitalares
  - Especialidades Médicas
  - Equipamentos
  - Unidades Assistenciais
- Controle de acesso utilizando permissões
- Perfil Administrador e Colaborador

O colaborador só consegue acessar os módulos para os quais recebeu permissão. Caso tente acessar diretamente a URL de um módulo sem autorização, o sistema retorna o erro 403 (Forbidden).

# Como executar o projeto

Clone o projeto:

```bash
git clone https://github.com/GabrielFrrra/Projeto-santacasa.git
```

Entre na pasta do projeto:

```bash
cd Projeto-santacasa
```

Instale as dependências:

```bash
composer install
npm install
```

Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure as credenciais do banco de dados no arquivo `.env`.

Depois execute:

```bash
php artisan migrate --seed
```

Inicie o Vite:

```bash
npm run dev
```

Em outro terminal:

```bash
php artisan serve
```

# Usuário administrador

Após executar os seeders, será criado um usuário administrador:

E-mail: admin@santacasa.org.br

Senha: password

# Estrutura

O projeto foi organizado seguindo a estrutura padrão do Laravel, utilizando Controllers, Models, Migrations, Seeders e Views Blade.

# Autor

Gabriel Ferreira
