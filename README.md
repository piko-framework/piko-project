# Piko basic project template

Basic Skeletton to build a Piko based application

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

There is a file named `.env` at the root of the project. This file contains some environment variables :

```
PIKO_DEBUG        = 1
PIKO_ENV          = dev
APP_TIMEZONE      = Europe/Paris
APP_LANGUAGE      = fr
ADMIN_EMAIL       = youremail@yourhost.com
```

Set `PIKO_DEBUG = 0` and `PIKO_ENV = prod` when your project is ready for production.

