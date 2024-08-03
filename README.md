# Rokomari with laravel

## Features
- Create, read, update, delete of user
- Create, read, update, delete of author 
- Create, read, update, delete of book 

## Tech
- Laravel Framework

## Installation
Install the dependencies and devDependencies and start the server.
```sh
$ composer install
$ php artisan key:generate
```
Running Migrations
```sh
$ php artisan migrate
```
Run the Server Project
```sh
$ php artisan serve
```
Verify the deployment to your server address in your browser
```sh
$ 127.0.0.1:8000
```

## Endpoints
```http
POST /api/users 
GET /api/users
PATCH /api/users/{id}
DELETE /api/users/{id}
POST /api/authors
GET /api/authors
PATCH /api/authors/{id}
DELETE /api/authors/{id}
POST /api/books
GET /api/books
PATCH /api/books/{id}
DELETE /api/books/{id}
```
## Status Code
| Status Code | Description |
| ------ | ------ |
| 200  | OK |
| 201 | CREATE |
| 400 | BAD REQUEST |
| 404 | NOT FOUND |
| 500 | INTERNAL SERVER ERROR |