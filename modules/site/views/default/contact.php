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
    $this->params['message']['content'] = '<strong>Some errors occured:</strong><br>' . implode('<br>', $errors);
}
?>
<div class="site-contact">

<h1><?= $this->title ?></h1>

<?php if (empty($message) || isset($message['danger'])): ?>
  <form action="" method="post">
    <p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you. </p>
    <div class="row mb-4">
      <div class="col-md-6">
        <input type="text" name="name" value="<?= $form->name ?>" class="form-control" placeholder="Name">
      </div>
      <div class="col-md-6">
        <input type="email" name="email" value="<?= $form->email ?>" class="form-control" placeholder="Email">
      </div>
    </div>

    <div class="mb-4">
      <input type="text" name="subject" value="<?= $form->subject ?>" class="form-control" id="inputSubject" placeholder="Subject">
    </div>

    <div class="mb-4">
      <label for="inputMessage">Message</label>
      <textarea  name="message" class="form-control" id="inputMessage" rows="5"><?= $form->message ?></textarea>
    </div>

    <div class="mb-4">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
<?php endif ?>
</div>