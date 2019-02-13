<?php
/* @var $this \piko\View */
/* @var $user \piko\User */

use piko\Piko;

$app = Piko::$app;
$user = Piko::get('user');
?>
<!DOCTYPE html>
<html lang="<?= $app->language ?>">
<head>
<meta charset="<?= $app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $this->escape($this->title) ?></title>

<link href="<?= Piko::getAlias('@web/assets/bootstrap/dist/css/' . (getenv('PIKO_ENV') == 'dev' ? 'bootstrap.css' : 'bootstrap.min.css')) ?>" rel="stylesheet">
<link href="<?= Piko::getAlias('@web/css/site.css') ?>" rel="stylesheet">

<?= $this->head() ?>
</head>
<body>

  <div class="wrap">
    <nav id="mainnav" class="navbar-inverse navbar-fixed-top navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= Piko::getAlias('@web/') ?>">Your company</a>
        </div>
        <div id="mainmenu" class="collapse navbar-collapse">
          <ul class="navbar-nav navbar-right nav">
            <li><a href="<?= Piko::getAlias('@web/') ?>">Home</a></li>
            <li><a href="<?= Piko::getAlias('@web/about') ?>">About</a></li>
            <li><a href="<?= Piko::getAlias('@web/site/default/contact') ?>">Contact</a></li>
            <?php if ($user->isGuest()): ?>
            <li><a href="<?= Piko::getAlias('@web/login') ?>">Login</a></li>
            <?php else:?>
            <li><a href="<?= Piko::getAlias('@web/logout') ?>">Logout (<?= $user->getIdentity()->username ?>)</a></li>
            <?php endif?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
    <?php if (isset($this->params['breadcrumbs'])): ?>
      <ol class="breadcrumb">
        <li><a href="<?= Piko::getAlias('@web/') ?>">Home</a></li>
      <?php foreach ($this->params['breadcrumbs'] as $breadcrumb): ?>
        <li><?= $breadcrumb ?></li>
      <?php endforeach ?>
      </ol>
    <?php endif ?>

    <?php if (isset($this->params['message'])): $type = array_keys($this->params['message'])[0] ?>
      <div class="alert alert-<?= $type ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $this->params['message'][$type] ?>
      </div>
    <?php endif ?>

    <?= $content ?>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

      <p class="pull-right">
        Powered by <a href="https://github.com/ilhooq/piko" rel="external">Piko Framework</a>
      </p>
    </div>
  </footer>

  <script src="<?= Piko::getAlias('@web/assets/jquery/dist/'.(getenv('PIKO_ENV') == 'dev' ? 'jquery.js' : 'jquery.min.js')) ?>"></script>
  <script src="<?= Piko::getAlias('@web/assets/bootstrap/dist/js/'.(getenv('PIKO_ENV') == 'dev' ? 'bootstrap.js' : 'bootstrap.min.js')) ?>"></script>

  <?= $this->endBody() ?>
  <script type="text/javascript">
  $(document).ready(function() {
      // Add the active class in the main menu
      $('#mainmenu a[href="' + location.pathname + '"]').parent().addClass('active')
  });
  </script>
</body>
</html>
