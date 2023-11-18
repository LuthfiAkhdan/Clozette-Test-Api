<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

- Using PHP 8.1

## Steps For Installing

1. Clone the repository
````
git clone https://github.com/LuthfiAkhdan/Clozette-Test-Api.git
````

2. Get in to directory
````
cd Clozette-Test-Api
````

2. Install dependencies
````
composer install
````

3. Copy .env file
```
cp .env.example .env
```

4. Modify `DB_*` value in `.env` with your database config.

5. Generate application key:
````
php artisan key:generate
````

6. Migrate
````
php artisan migrate
````

### Dummy Data

1. Generate the db seeder
````
php artisan db:seed
````

2. Testing the data
```
Login with :
email : admin@admin.com
password : password
```
