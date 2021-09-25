<?php
/* @var $this \piko\View */
/* @var $content string */

use piko\Application;
use piko\Piko;

$app = Application::getInstance();

/* @var $user \piko\User */
$user = Piko::get('user');

?>
<!DOCTYPE html>
  <html lang="<?= $app->language ?>">
  <head>
  <meta charset="<?= $app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->escape($this->title) ?></title>
  <?= $this->head() ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
  <link href="<?= Piko::getAlias('@web/css/site.css') ?>" rel="stylesheet">
</head>
<body>
  <nav id="mainnav" class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= Piko::getAlias('@web/') ?>">Your company</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="mainmenu" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="<?= $this->getUrl('site/default/index') ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $this->getUrl('site/default/about') ?>">About</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $this->getUrl('site/default/contact') ?>">Contact</a></li>
          <?php if ($user->isGuest()): ?>
          <li class="nav-item"><a class="nav-link" href="<?= $this->getUrl('site/default/login') ?>">Login</a></li>
          <?php else:?>
          <li class="nav-item"><a class="nav-link" href="<?= $this->getUrl('site/default/logout') ?>">Logout (<?= $user->getIdentity()->username ?>)</a></li>
          <?php endif?>
        </ul>
      </div>
    </div>
  </nav>

  <div role="main" class="wrap">
    <div class="container">

     <?php if (isset($this->params['breadcrumbs'])): $count = count($this->params['breadcrumbs']) ?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= Piko::getAlias('@web/') ?>">Home</a></li>
      <?php foreach ($this->params['breadcrumbs'] as $k => $breadcrumb): ?>
        <li class="breadcrumb-item<?= ($count == $k+1) ? ' active' : '' ?>"><?= $breadcrumb ?></li>
      <?php endforeach ?>
      </ol>
    <?php endif ?>

    <?php if (isset($this->params['message']) && is_array($this->params['message'])): ?>
    <div class="container alert alert-<?= $this->params['message']['type'] ?> alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?= $this->params['message']['content'] ?>
    </div>
    <?php endif ?>

    <?= $content ?>
    </div>
  </div>

  <footer class="footer mt-auto">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          &copy; Your Company <?= date('Y') ?>
        </div>
        <div class="col-sm text-right">
          Powered by <a href="https://github.com/piko-framework/" rel="external">Piko Framework</a>
        </div>
      </div>
    </div>
  </footer>

  <?= $this->endBody() ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
          crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous"></script>
  <script src="<?= Piko::getAlias('@web/js/site.js') ?>"></script>
</body>
</html>
