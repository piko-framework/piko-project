<?php
/* @var $this \piko\View */
/* @var $content string */

use piko\Piko;

$app = Piko::$app;

/* @var $user \piko\User */
$user = Piko::get('user');

/* @var $router \piko\Router */
$router = Piko::get('router');
?>
<!DOCTYPE html>
  <html lang="<?= $app->language ?>">
  <head>
  <meta charset="<?= $app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->escape($this->title) ?></title>
  <link href="<?= Piko::getAlias('@web/css/' . (getenv('PIKO_ENV') == 'dev' ? 'main.css?r=' . uniqid() : 'main.min.css')) ?>" rel="stylesheet">
  <?= $this->head() ?>
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
          <li class="nav-item"><a class="nav-link" href="<?= $router->getUrl('site/default/index') ?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $router->getUrl('site/default/about') ?>">About</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $router->getUrl('site/default/contact') ?>">Contact</a></li>
          <?php if ($user->isGuest()): ?>
          <li class="nav-item"><a class="nav-link" href="<?= $router->getUrl('site/default/login') ?>">Login</a></li>
          <?php else:?>
          <li class="nav-item"><a class="nav-link" href="<?= $router->getUrl('site/default/logout') ?>">Logout (<?= $user->getIdentity()->username ?>)</a></li>
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
          Powered by <a href="https://github.com/ilhooq/piko" rel="external">Piko Framework</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?= Piko::getAlias('@web/js/'.(getenv('PIKO_ENV') == 'dev' ? 'main.js' : 'main.min.js')) ?>"></script>

  <?= $this->endBody() ?>
</body>
</html>
