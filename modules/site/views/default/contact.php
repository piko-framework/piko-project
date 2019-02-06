<?php

/* @var $this piko\View */
/* @var $message array */
/* @var $form app\modules\site\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;


if (!empty($message)) {
    if (isset($message['error'])) {

        $message['danger'] = $message['error'] . '<br>' . implode('<br>', $form->getErrors());
        unset($message['error']);
    }

    $this->params['message']= $message;
}


?>
<div class="site-contact">

  <div class="row">
    <div class="col-sm-offset-2 col-sm-8">
      <h1><?= $this->title ?></h1>
    </div>
  </div>


<?php if (empty($message) || isset($message['danger'])): ?>
  <form action="" class="form-horizontal" method="post" enctype="application/x-www-form-urlencoded">
    <div class="row">
      <div class="col-sm-offset-2 col-sm-8">
        <p>If you have business inquiries or other questions, please fill out the following form to contact us. Thank you. </p>
        <hr>
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-8">
        <input type="text" name="name" value="<?= $form->name ?>" class="form-control" id="inputName" placeholder="Name" required="required">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-8">
        <input type="email" name="email" value="<?= $form->email ?>" class="form-control" id="inputEmail3" placeholder="Email" required="required">
      </div>
    </div>
    <div class="form-group">
      <label for="inputSubject" class="col-sm-2 control-label">Subject</label>
      <div class="col-sm-8">
        <input type="text" name="subject" value="<?= $form->subject ?>" class="form-control" id="inputSubject" placeholder="Subject" required="required">
      </div>
    </div>
    <div class="form-group">
      <label for="inputMessage" class="col-sm-2 control-label">Subject</label>
      <div class="col-sm-8">
        <textarea  name="message" class="form-control" id="inputMessage" required="required" rows="5"><?= $form->message ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="text" name="email_2" class="hidden" placeholder="Don't fill this field" >
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
<?php endif ?>
</div>