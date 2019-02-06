<?php

/* @var $this piko\View */
/* @var $error string */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

if (!empty($error)) {
    $this->params['message']['danger']= $error;
}

?>

<div class="site-login">
  <h1><?= $this->title ?></h1>
  <p>Please fill out the following fields to login:</p>

  <form action="" id="login-form" class="form-horizontal" method="post">

    <div class="form-group field-loginform-username required has-error">
      <label class="col-lg-1 control-label" for="loginform-username">Username</label>
      <div class="col-lg-3">
        <input type="text" id="username" class="form-control" name="username" autofocus="autofocus" aria-required="true"
          aria-invalid="true">
      </div>

    </div>
    <div class="form-group field-loginform-password required">
      <label class="col-lg-1 control-label" for="loginform-password">Password</label>
      <div class="col-lg-3">
        <input type="password" id="loginform-password" class="form-control" name="password" value="" aria-required="true">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-offset-1 col-lg-11">
        <button type="submit" class="btn btn-primary" name="login-button">Login</button>
      </div>
    </div>

  </form>
  <div class="col-lg-offset-1" style="color: #999;">
    You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br> To modify the username/password, please check out the code
    <code>app\module\site\models\User::$users</code>
    .
  </div>
</div>