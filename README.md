
# Technical Test

Project created for a technical test Grownet.



# Requirement

PHP v8.0 or higher
MySQL v8 or higher

To run the project, follow these steps:

1. Run 'composer install' to install the dependencies.

2. Configure the .env file with the database information.

3. Run migrations and seeders.

   The main seeder is DatabaseSeeder.

4. Initial login credentials:

Default user:
```
   Email: admin@admin.co
   Password: password
```
5. Start the Laravel server:

```
   php artisan serve
```




## Proyect 

- PHP 8.1.26
- Laravel 8.75
- MySQL 8.0.35
- Composer 2.6.6

## Installation

Clone proyect

```bash
  git clone https://github.com/GiioBass/grownet.git
  cd grownet
```
Create Data Base.

Create file .env and configure DB connection

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=grownet
    DB_USERNAME=
    DB_PASSWORD=
```
Install composer

```bash
  composer install
```
Run migrations

```bash
  php artisan migrate
```
Run Seeder

```bash
  php artisan db:seed
```

Run server web with artisan

```bash
  php artisan serve
```

# Grownet API Documentation
### Endpoints


Authenticate

    Method: POST
    URL: http://127.0.0.1:8000/api/login
    Description: Authenticate user.
    Authentication: None.
    Body:

    json

    {
        "email": "admin@admin.co",
        "password": "password"
    }

    This endpoint return a Token

Index

    Method: GET
    URL: http://127.0.0.1:8000/api/v1/tasks
    Description: Get all tasks.
    Authentication: Bearer token required.

Show

    Method: GET
    URL: http://127.0.0.1:8000/api/v1/tasks/20
    Description: Get a specific task.
    Authentication: Bearer token required.

Create

    Method: POST
    URL: http://127.0.0.1:8000/api/v1/tasks
    Description: Create a new task.
    Authentication: Bearer token required.
    Body:

    json

    {
        "title": "test",
        "description": "Test descript",
        "due_date": "1971-10-18",
        "status": 1
    }


Update

    Method: PUT
    URL: http://127.0.0.1:8000/api/v1/tasks/20
    Description: Update a task.
    Authentication: Bearer token required.
    Body:

    json

    {
        "title": "test edit",
        "description": "Test description edit .",
        "due_date": "1990-09-10",
        "status": 1
    }

Delete

    Method: DELETE
    URL: http://127.0.0.1:8000/api/v1/tasks/20
    Description: Delete a task.
    Authentication: Bearer token required.
    

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)


## Authors

- [@Giiobass](https://www.github.com/Giiobass)

