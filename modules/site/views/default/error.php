<?php

/* @var $this \piko\View */
/* @var $exception \Exception */

$message = getenv('APP_ENV') === 'dev' ? $exception->getMessage() . ' (#' . $exception->getCode() . ')' : 'Not found';

$this->title = $message;

?>
<div class="site-error">

<h1><?= $this->escape($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br($this->escape($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

    <?php if (getenv('APP_ENV') === 'dev'): ?>
    <div class="card bg-light mb-3">
      <div class="card-header">Trace:</div>
      <div class="card-body">
        <?= nl2br($exception->getTraceAsString()) ?>
      </div>
    </div>
    <?php endif ?>
</div>
