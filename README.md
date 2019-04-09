# Piko basic project template

Basic Skeletton to build a Piko based application

## Install via composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

```bash
composer create-project ilhooq/piko-project yourproject
```

## Run

```bash
cd yourproject && php -S localhost:8080 -t web
```

## Assets customization
Javascrip and css are build with [Webpack](https://webpack.js.org/)

Edit `assets/js/main.js` and `assets/scss/site.css`

To compile them :

```bash
npm -i && npm run build
```