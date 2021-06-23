# Project management software (API)

## Features

- User Management
- Project Management

## Technology

- [PHP 8.0](https://www.php.net/downloads.php)
- [Laravel 8.0](https://laravel.com/)
- [MySQL 8.0](https://www.mysql.com/)

# Getting started

### Installation

Please check the official laravel installation guide for server requirements before you
start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

##### Clone the repository

```bash
git clone https://github.com/sohel1999/gotipath_pms_backend.git
```

#### Switch to the repo folder

```bash 
 cd gotipath_pms_backend
```

#### Install all the dependencies using composer

```bash 
  composer install
  ```

#### Copy the example env file and make the required configuration changes in the .env file

```bash 
    cp .env.example .env
```

#### Generate a new application key

```bash
    php artisan key:generate
```

#### Run the database migrations (**Set the database connection in .env before migrating**)

```bash
 php artisan migrate --seed
```

#### Create grant type password for api auth

```bash
 php artisan passport:install
```
