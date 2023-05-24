# petanikita-api

Repository for PetaniKita Laravel Back-end API for authentication and product endpoints.

## API Documentation

For API documentations, see
our [Postman API documentation](https://www.postman.com/martian-space-987932/workspace/petanikita-workspace/api/ebdc204e-0a9d-4ec0-89a9-bbda56f4d1c7?branch=master).

## Setup

### Requirements

- [PHP](https://www.php.net/manual/en/install.php) >= v8.1
- [Composer](https://getcomposer.org)
- A database (Choose between MySQL, PostgreSQL, or SQLite. See
  the [Laravel documentation](https://laravel.com/docs/10.x/database))

### Installation

1. Clone the repository

```shell
git clone https://github.com/c23-ps419/petanikita-api
```

2. Install dependencies using Composer

```shell
composer install
```

3. Copy the `.env.example` file to `.env` file

```shell
cp .env.example .env
```

5. Configure the configuration variables in `.env` file, except the `APP_KEY` variable

6. Generate the `APP_KEY` environment variable using `artisan` command

```shell
php artisan key:generate
```

7. Migrate the database

```shell
php artisan migrate
```

8. (Optional) Populate your database with data

```shell
php artisan db:seed
```

9. Run the server

```shell
php artisan serve
```