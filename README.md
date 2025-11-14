# Projeto Laravel

Uma aplicação backend desenvolvida com Laravel 11 e PHP 8.3, utilizando arquitetura hexagonal e boas práticas de desenvolvimento.

## 📋 Pré-requisitos

- PHP 8.3 ou superior
- Composer
- Docker e Docker Compose
- Git

## 🚀 Instalação

### 1. Clonar o repositório

```bash
git clone <seu-repositorio-url>
cd <nome-do-projeto>
```

### 2. Instalar dependências PHP

```bash
composer install
```

### 3. Configurar variáveis de ambiente

```bash
cp .env.example .env
```

Edite o arquivo `.env` com suas configurações (banco de dados, cache, fila, etc.).

### 4. Gerar a chave de aplicação

```bash
php artisan key:generate
```

## 🐳 Docker Compose

### Subir os containers

```bash
docker-compose up -d
```

Esse comando irá iniciar todos os serviços definidos no arquivo `docker-compose.yml` (MySQL, Redis, etc.).

### Parar os containers

```bash
docker-compose down
```

### Ver logs dos containers

```bash
docker-compose logs -f
```

## 💾 Banco de Dados

### Executar migrations

```bash
php artisan migrate
```

Esse comando cria todas as tabelas definidas nas migrations.

### Executar seeders

```bash
php artisan db:seed --class=ClientSeeder
```

Esse comando popula o banco de dados com dados de teste utilizando as factories e seeders.

### Executar migrations e seeders juntos (reset)

```bash
php artisan migrate:fresh --seed
```

**⚠️ Cuidado:** Este comando deleta todas as tabelas e recria do zero, perdendo todos os dados.

### Executar um seeder específico

```bash
php artisan db:seed --class=ClientSeeder
```

## 🔄 Fluxo Completo de Inicialização

Para inicializar o projeto do zero, execute os comandos na ordem:

```bash
# 1. Clonar repositório
git clone <seu-repositorio-url>
cd <nome-do-projeto>

# 2. Instalar dependências
composer install

# 3. Copiar arquivo de ambiente
cp .env.example .env

# 4. Gerar chave
php artisan key:generate

# 5. Subir containers Docker
docker-compose up -d

# 6. Executar migrations
php artisan migrate

# 7. Executar seeders (opcional)
php artisan db:seed
```

## 🛠️ Comandos Úteis

### Desenvolvimento

```bash
# Iniciar servidor de desenvolvimento
php artisan serve

# Criar nova migration
php artisan make:migration create_tabela_table

# Criar novo model
php artisan make:model NomeModel

# Criar novo factory
php artisan make:factory NomeFactory

# Criar novo seeder
php artisan make:seeder NomeSeeder
```

### Cache

```bash
# Limpar cache
php artisan cache:clear

# Limpar configurações
php artisan config:clear

# Limpar views compiladas
php artisan view:clear
```

### Banco de Dados

```bash
# Desfazer última migration
php artisan migrate:rollback

# Desfazer todas as migrations
php artisan migrate:reset

# Desfazer tudo e refazer
php artisan migrate:refresh

# Desfazer tudo, refazer e executar seeders
php artisan migrate:refresh --seed
```

## 📁 Estrutura do Projeto

```
📦app
 ┣ 📂Classes
 ┃ ┗ 📜ApiResponseClass.php
 ┣ 📂Console
 ┃ ┗ 📜Kernel.php
 ┣ 📂Exceptions
 ┃ ┗ 📜Handler.php
 ┣ 📂Http
 ┃ ┣ 📂Controllers
 ┃ ┃ ┣ 📜ClientController.php
 ┃ ┃ ┗ 📜Controller.php
 ┃ ┣ 📂Middleware
 ┃ ┃ ┣ 📜Authenticate.php
 ┃ ┃ ┣ 📜EncryptCookies.php
 ┃ ┃ ┣ 📜PreventRequestsDuringMaintenance.php
 ┃ ┃ ┣ 📜RedirectIfAuthenticated.php
 ┃ ┃ ┣ 📜TrimStrings.php
 ┃ ┃ ┣ 📜TrustHosts.php
 ┃ ┃ ┣ 📜TrustProxies.php
 ┃ ┃ ┗ 📜VerifyCsrfToken.php
 ┃ ┣ 📂Requests
 ┃ ┃ ┣ 📜StoreClientRequest.php
 ┃ ┃ ┗ 📜UpdateClientRequest.php
 ┃ ┣ 📂Resources
 ┃ ┃ ┗ 📜ClientResource.php
 ┃ ┗ 📜Kernel.php
 ┣ 📂Interfaces
 ┃ ┣ 📜ClientRepositoryInterface.php
 ┃ ┗ 📜ClientServiceInterface.php
 ┣ 📂Models
 ┃ ┣ 📜Client.php
 ┃ ┗ 📜User.php
 ┣ 📂Providers
 ┃ ┣ 📜AppServiceProvider.php
 ┃ ┣ 📜AuthServiceProvider.php
 ┃ ┣ 📜BroadcastServiceProvider.php
 ┃ ┣ 📜EventServiceProvider.php
 ┃ ┣ 📜RepositoryServiceProvider.php
 ┃ ┣ 📜RouteServiceProvider.php
 ┃ ┗ 📜ServiceServiceProvider.php
 ┣ 📂Repositories
 ┃ ┗ 📜ClientRepository.php
 ┣ 📂Services
 ┃ ┗ 📜ClientService.php
 ┗ 📂ValueObjects
 ┃ ┗ 📜Email.php
 📦config
 ┣ 📜app.php
 ┣ 📜auth.php
 ┣ 📜broadcasting.php
 ┣ 📜cache.php
 ┣ 📜cors.php
 ┣ 📜database.php
 ┣ 📜filesystems.php
 ┣ 📜hashing.php
 ┣ 📜logging.php
 ┣ 📜mail.php
 ┣ 📜queue.php
 ┣ 📜services.php
 ┣ 📜session.php
 ┗ 📜view.php
 📦database
 ┣ 📂factories
 ┃ ┣ 📜ClientFactory.php
 ┃ ┗ 📜UserFactory.php
 ┣ 📂migrations
 ┃ ┣ 📜2014_10_12_000000_create_users_table.php
 ┃ ┣ 📜2014_10_12_100000_create_password_resets_table.php
 ┃ ┣ 📜2019_08_19_000000_create_failed_jobs_table.php
 ┃ ┣ 📜2021_07_08_004848_create_clients_table.php
 ┃ ┣ 📜2025_11_14_135008_add_columns_to_clients_table.php
 ┃ ┗ 📜2025_11_14_140849_change_id_to_clients_table.php
 ┣ 📂seeders
 ┃ ┣ 📜ClientSeeder.php
 ┃ ┗ 📜DatabaseSeeder.php
 ┗ 📜.gitignore
 📦resources
 ┣ 📂css
 ┃ ┗ 📜app.css
 ┣ 📂js
 ┃ ┣ 📜app.js
 ┃ ┗ 📜bootstrap.js
 ┣ 📂lang
 ┃ ┗ 📂en
 ┃ ┃ ┣ 📜auth.php
 ┃ ┃ ┣ 📜pagination.php
 ┃ ┃ ┣ 📜passwords.php
 ┃ ┃ ┗ 📜validation.php
 ┗ 📂views
 ┃ ┣ 📂clients
 ┃ ┃ ┣ 📜create.blade.php
 ┃ ┃ ┣ 📜edit.blade.php
 ┃ ┃ ┣ 📜index.blade.php
 ┃ ┃ ┗ 📜show.blade.php
 ┃ ┣ 📜app.blade.php
 ┃ ┣ 📜home.blade.php
 ┃ ┗ 📜welcome.blade.php
```

## 🔐 Configuração de Ambiente

Variáveis importantes no `.env`:

```
APP_NAME=MeuProjeto
APP_ENV=local
APP_DEBUG=true
APP_KEY=                    # Gerada automaticamente com php artisan key:generate
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

## 📚 Documentação

- [Documentação Oficial do Laravel](https://laravel.com/docs)
- [Documentação de Factories](https://laravel.com/docs/eloquent-factories)
- [Documentação de Seeders](https://laravel.com/docs/seeding)
- [Documentação de Migrations](https://laravel.com/docs/migrations)

## 🤝 Contribuindo

1. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
2. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
3. Push para a branch (`git push origin feature/AmazingFeature`)
4. Abra um Pull Request

## 📝 Licença

Este projeto está licenciado sob a MIT License - veja o arquivo LICENSE para detalhes.

## 👤 Autor

Seu Nome - [@seu_usuario](https://github.com/seu_usuario)
