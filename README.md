
<h1 align="center">
  <br>
  <br>
  Dashboard manager
  <br>
</h1>

<h4 align="center">Dashboard manager build with >laravel< </h4>

## Key Features

* All crud operations
* Authentication
* Tests
* validation forms
* Audit
* Export to csv and xls

 ## Requirements
 * php 8.2.3 or above
 * laravel 11 or above
 

## ENV

Setup database credentials

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Blog
DB_USERNAME=example   
DB_PASSWORD=example
```

## How To Install

To clone and run this application, you'll need [Git](https://git-scm.com) and [Laravel](https://laravel.com) and [composer](https://getcomposer.org) installed on your computer. From your command line:

```bash
# Clone repository
$ git clone https://github.com/GabrielLacerda000/Bussines-manager.git

# Go into the repository
$ cd bussines-manager

# Generate key
$ php artisan key:generate

# Install dependencies
$ composer update

# In case of errors
$ composer install

# Run migrations
$ php artisan migrate

# Run seeders
$ php artisan db:seed

# Run the app
$ php artisan serve
```

## How to use
Login with credentials made after seeding and start CRUD operations

##Test
 
  ```bash
$ php artisan test
```
obs: tests are not complete yet and may have bugs and troubles

## Futures updates

* add tests
* add user panel

## License

MIT

---

> GitHub [@GabrielLacerda000](https://github.com/GabrielLacerda000) &nbsp;&middot;&nbsp;
> LinkedIn [@Gabiel Gomes](https://www.linkedin.com/in/gabriel-gomes-a646aa1b6/)

