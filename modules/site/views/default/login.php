<?php

/* @var $this piko\View */
/* @var $error string */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

if (!empty($error)) {
    $this->params['message']['type']= 'danger';
    $this->params['message']['content']= $error;
}
?>
<h1><?= $this->title ?></h1>
<p>Please fill out the following fields to login:</p>

<form action="" method="post">
  <div class="form-group row">
    <label for="loginform-username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10 col-md-4">
      <input type="text" id="loginform-username" class="form-control" name="username" autofocus required>
    </div>
  </div>
  <div class="form-group row">
   <label for="loginform-password" class="col-sm-2 col-form-label">Password</label>
   <div class="col-sm-10 col-md-4">
     <input type="password" id="loginform-password" class="form-control" name="password" value="" required>
   </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary" name="login-button">Login</button>
  </div>
</form>

<div style="color: #999;">
  You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br> To modify the username/password, please check out the code
  <code>app\module\site\models\User::$users</code>
  .
</div>
