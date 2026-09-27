# Webcom Task

Laravel 13 test task with Filament admin panel and REST API.

## Requirements

- PHP 8.4+
- Docker
- Docker Compose
- MySQL 8.4

## Installation

Clone the repository:

```bash
git clone https://github.com/Minoj/webcom-task.git
cd webcom-task
```

Start Docker containers:

```bash
docker compose up -d --build
```

Install PHP dependencies:

```bash
docker compose exec php composer install
```

Create environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
docker compose exec php php artisan key:generate
```

Run database migrations:

```bash
docker compose exec php php artisan migrate
```

Create storage link:

```bash
docker compose exec php php artisan storage:link
```

## Admin Panel

Admin panel:

http://localhost:8080/admin

Create an admin user:

```bash
docker compose exec php php artisan make:filament-user
```

The admin panel provides CRUD operations for:

- Pages
- Categories
- Products

### Pages

Fields:

- Title
- Short description
- Full HTML description

### Categories

Fields:

- Name
- Image
- Short description
- Full HTML description

### Products

Fields:

- Name
- Image
- Short description
- Full HTML description
- Category

## API

### Public endpoints

Get all categories:

```http
GET /api/categories
```

Get a single category:

```http
GET /api/categories/{id}
```

Get all products:

```http
GET /api/products
```

Get a single product:

```http
GET /api/products/{id}
```

### Protected endpoints

The following endpoints require a Bearer token:

```http
POST /api/categories
PUT /api/categories/{id}
DELETE /api/categories/{id}
```

Authentication is implemented using Laravel Sanctum.

### Category creation

Example request:

```http
POST /api/categories
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

Supported fields:

- name
- image
- short_description
- full_description

### Category update

Example:

```http
PUT /api/categories/{id}
Authorization: Bearer {token}
```

### Category deletion

Example:

```http
DELETE /api/categories/{id}
Authorization: Bearer {token}
```

## Validation

Validation is implemented for admin forms and API requests.

Examples:

- Required category/product/page names
- Maximum text length
- Image validation
- Category relationship validation

## File Storage

Images are stored using Laravel's public filesystem:

```text
storage/app/public
```

Category images:

```text
storage/app/public/categories
```

Product images:

```text
storage/app/public/products
```

Create the public storage link with:

```bash
docker compose exec php php artisan storage:link
```

## Database

The project uses MySQL 8.4.

Database structure is created using Laravel migrations.

Main tables:

- users
- pages
- categories
- products
- personal_access_tokens

Products have a relationship with categories.

## Pagination

The categories and products API endpoints use Laravel pagination.

## Technologies

- Laravel 13
- PHP 8.4
- MySQL 8.4
- Filament 5
- Laravel Sanctum
- Docker
- Docker Compose
- Nginx
- Eloquent ORM

## Project Structure

```text
app/
├── Filament/
│   └── Resources/
├── Http/
│   └── Controllers/
│       └── Api/
└── Models/

database/
└── migrations/

routes/
├── api.php
└── web.php

storage/
└── app/
    └── public/
```

## GitHub

Repository:

https://github.com/Minoj/webcom-task
