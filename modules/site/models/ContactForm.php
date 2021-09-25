<?php
namespace app\modules\site\models;

/**
 * This is the model class for the contact form.
 */
class ContactForm extends \piko\Model
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected function validate(): void
    {
        if (empty($this->name)) {
            $this->errors['name'] = 'Name is required';
        }

        if (empty($this->email)) {
            $this->errors['email'] = 'Email is required';
        }
        elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Email is invalid';
        }

        if (empty($this->subject)) {
            $this->errors['subject'] = 'Subject is required';
        }

        if (empty($this->message)) {
            $this->errors['message'] = 'Subject is required';
        }
    }

    public function sendMessage()
    {
        $message = 'Author: ' . $this->name . "\n"
                 . 'Email: ' . $this->email . "\n"
                 . 'Message: ' . $this->message . "\n";

        $senderEmail = $_ENV['SITE_EMAIL'] ?? '';

        $ret = mail($senderEmail, $this->subject, $message);

        if ($ret === false) {
            $this->errors['send_message'] = 'Cannot send message';
        }

        return $ret;
    }
}