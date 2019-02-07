# Piko basic project template

Basic Skeletton to build a Piko based application

## 1. Install via composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

```bash
php composer.phar global require "fxp/composer-asset-plugin:^1.3.1"
php composer.phar create-project ilhooq/piko-project yourproject
```

## 2. Run

```bash
cd yourproject && php -S localhost:8080 -t web
```