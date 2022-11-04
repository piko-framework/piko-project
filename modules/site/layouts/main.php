<?php
/* @var $this \Piko\View */
/* @var $content string */
/* @var $user \Piko\User */

$user = $this->params['user'];
?>
<!DOCTYPE html>
  <html lang="<?= $this->params['language'] ?>">
  <head>
  <meta charset="<?= $this->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->escape($this->title) ?></title>
  <?= $this->head() ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
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
        <ul class="navbar-nav ms-auto">
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
      <ol class="breadcrumb p-2">
        <li class="breadcrumb-item"><a href="<?= Piko::getAlias('@web/') ?>">Home</a></li>
      <?php foreach ($this->params['breadcrumbs'] as $k => $breadcrumb): ?>
        <li class="breadcrumb-item<?= ($count == $k+1) ? ' active' : '' ?>"><?= $breadcrumb ?></li>
      <?php endforeach ?>
      </ol>
    <?php endif ?>

    <?php if (isset($this->params['message']) && is_array($this->params['message'])): ?>
    <div class="container alert alert-<?= $this->params['message']['type'] ?> alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
          crossorigin="anonymous"></script>

  <script src="<?= Piko::getAlias('@web/js/site.js') ?>"></script>
</body>
</html>
