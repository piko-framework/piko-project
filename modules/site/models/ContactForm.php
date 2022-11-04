<?php
namespace app\modules\site\models;

use Piko\ModelTrait;

/**
 * This is the model class for the contact form.
 */
class ContactForm
{
    use ModelTrait;

    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected function validate(): void
    {
        if (empty($this->name)) {
            $this->setError('name', 'Name is required');
        }

        if (empty($this->email)) {
            $this->setError('email', 'Email is required');
        }
        elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->setError('email', 'Email is invalid');
        }

        if (empty($this->subject)) {
            $this->setError('subject', 'Subject is required');
        }

        if (empty($this->message)) {
            $this->setError('message', 'Message is required');
        }
    }

    public function sendMessage()
    {
        $message = 'Author: ' . $this->name . "\n"
                 . 'Email: ' . $this->email . "\n"
                 . 'Message: ' . $this->message . "\n";

        $ret = mail(getenv('SITE_EMAIL'), $this->subject, $message);

        if ($ret === false) {
            $this->errors['send_message'] = 'Cannot send message';
        }

        return $ret;
    }
}