# Piko project

A basic Skeletton to build a [Piko framework](https://piko-framework.github.io/) based application.

## Install via composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

```bash
composer create-project piko/project yourproject
```

## Run using the PHP built-in web server

```bash
cd yourproject && php -S localhost:8080 -t web
```

## Environment file

There is a file named `env.php` at the root of the project. This file contains some environment variables :

```php
return [
    'DEBUG' => '1',
    'APP_ENV' => 'dev',
    'APP_LANGUAGE' => 'en',
    'SITE_EMAIL' => 'youremail@somehost.com',
]
```

Set `DEBUG = 0` and `APP_ENV = prod` when your project is ready for production.

## Project features

- [Bootstrap 5](https://getbootstrap.com/) integration
- Simple user authentication
- Contact form

## Documentation

[https://piko-framework.github.io/](https://piko-framework.github.io/)
