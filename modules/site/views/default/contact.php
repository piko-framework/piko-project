<?php

/* @var $this piko\View */
/* @var $message array */
/* @var $form app\modules\site\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

$errors = $form->getErrors();

if (!empty($message)) {
    $this->params['message']['type'] = 'success';
    $this->params['message']['content'] = $message;
} elseif (!empty($errors)) {
    $this->params['message']['type'] = 'danger';
    $this->params['message']['content'] = 'Des erreurs ont eu lieu :<br>' . implode('<br>', $errors);
}
?>
<div class="site-contact">

<h1><?= $this->title ?></h1>

<?php if (empty($message) || isset($message['danger'])): ?>
  <form action="" method="post">
    <p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you. </p>
    <div class="form-row mb-4">
      <div class="col-md">
        <input type="text" name="name" value="<?= $form->name ?>" class="form-control" placeholder="Name" required>
      </div>
      <div class="col-md">
        <input type="email" name="email" value="<?= $form->email ?>" class="form-control" placeholder="Email" required>
      </div>
    </div>

    <div class="form-group">
      <input type="text" name="subject" value="<?= $form->subject ?>" class="form-control" id="inputSubject" placeholder="Subject" required="required">
    </div>
    <div class="form-group">
      <label for="inputMessage">Message</label>
      <textarea  name="message" class="form-control" id="inputMessage" required="required" rows="5"><?= $form->message ?></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
      <input type="text" name="email_2" class="invisible" placeholder="Don't fill this field" >
    </div>
  </form>
<?php endif ?>
</div>