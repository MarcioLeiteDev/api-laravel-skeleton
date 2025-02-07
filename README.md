<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API REST - Laravel 11

This is project skeleton for the API REST develop Laravel 11 including authentication JTW, CRUD of users and middlewares of roles:



## Instalation

1.clone the repository

```sh
git clone git@github.com:MarcioLeiteDev/api-laravel-skeleton.git
```

2. install the dependencies
```sh
composer install
```
3. config the file .env
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api_laravel
DB_USERNAME=root
DB_PASSWORD=
```

4. generate aplication key
```sh
php artisan key:generate
```

5. config the JWT
```sh
php artisan jwt:secret
```

6. execute the migration and seeders
```sh
php artisan migrate --seed
```

7. start the server
```sh
php artisan serve
```

## Authentication

## Register Users

ENDPOINT: POST /api/register

Payload

```sh
{
  "name": "Nome do Usuário",
  "email": "usuario@email.com",
  "password": "senha123",
  "password_confirmation": "senha123",
  "role": "admin" // ou "user"
}
```

## Response
```sh
{
    "user": {
        "name": "Nome do Usuário",
        "email": "usuario@email.com",
        "role": "admin",
        "updated_at": "2025-02-07T15:36:44.000000Z",
        "created_at": "2025-02-07T15:36:44.000000Z",
        "id": 2
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzM4OTQyNjA0LCJleHAiOjE3Mzg5NDYyMDQsIm5iZiI6MTczODk0MjYwNCwianRpIjoiZkhIM29WbllhM2I3d3dDNSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.wg0ZHAWvkz81sJvxJ9gUD_rToocQpx2PBfGzLGw-4CM"
}
```

## Login User

ENDPOINT: POST /api/login

Payload

```sh
{
  "email": "usuario@email.com",
  "password": "senha123"
}
```

## Response

```sh
{
  "token": "jwt_token_aqui"
}
```

## Verify Authentication

ENDPOINT GET /api/me

Headers:
```sh
{
  "Authorization": "Bearer jwt_token_aqui"
}
```

Payload

```sh

{
    "id": 2,
    "name": "Usuario",
    "email": "usuario@email.com",
    "email_verified_at": null,
    "role": "admin",
    "remember_token": null,
    "created_at": "2025-02-07T15:36:44.000000Z",
    "updated_at": "2025-02-07T15:36:44.000000Z"
}

```

## License

Development by Marcio Leite Dev
