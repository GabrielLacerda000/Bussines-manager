
<h1 align="center">
  <br>
  <br>
  Blog
  <br>
</h1>

<h4 align="center">Dashboard manager build with >laravel< </h4>

## Key Features

* All crud operations
* Authentication
* Tests
* validation forms

 ## Requirements
 * php 8.2.3 or above
 

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
# Clone this repository
$ git clone repo 

# Go into the repository
$ cd blog

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
You can use any app to test api like [Insominia](https://insomnia.rest/download) or [Postman](https://www.postman.com)  set de bearer token generated with login and set up data.
Define the base uri and use the endpoints below.

Routes:
* GET - /api/posts - retreive all posts
* GET - /api/posts/id - retrieve one post
* POST - /api/posts - create post
* PATCH - /api/posts/id - edit post
* DELETE - /api/posts/id - delete post

* POST - /auth/login - login user with email and password
* POST - /auth/register - register a user with email, password and name
* POST - /auth/logout - logout user

 ## How to use tests
 
  ```bash
$ php artisan test
```
obs: tests are not complete yet and may have bugs and troubles

## Futures updates

* tests fixes
* Refactor some functions
* Add actions classes

## License

MIT

---

> GitHub [@GabrielLacerda000](https://github.com/GabrielLacerda000) &nbsp;&middot;&nbsp;
> LinkedIn [@Gabiel Gomes](https://www.linkedin.com/in/gabriel-gomes-a646aa1b6/)

