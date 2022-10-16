<?php
namespace app\modules\site\controllers;

use piko\Piko;
use app\modules\site\models\ContactForm;
use app\modules\site\models\User;

class DefaultController extends \piko\Controller
{
    public function indexAction()
    {
        return $this->render('index');
    }

    public function aboutAction()
    {
        return $this->render('about');
    }

    public function contactAction()
    {
        $form = new ContactForm();
        $message = '';

        if (!empty($_POST)) {

            $form->bind($_POST);

            if ($form->isValid() && $form->sendMessage()) {
                $message = 'Thank you for contacting us. We will respond to you as soon as possible.';
            }
        }

        return $this->render('contact', [
            'form' => $form,
            'message' => $message,
        ]);
    }

    public function loginAction()
    {
        $error = '';

        if ($this->isPost()) {

            $userIdentity = User::findByUsername($_POST['username']);

            if ($userIdentity instanceof User && $userIdentity->validatePassword($_POST['password'])) {
                $user = Piko::get('user');
                $user->login($userIdentity);

                return $this->redirect($this->getUrl('site/default/index'));
            }

            $error = 'Auhtentication failed';
        }

        return $this->render('login', ['error' => $error]);
    }

    public function logoutAction()
    {
        $user = Piko::get('user');
        $user->logout();
        $this->redirect($this->getUrl('site/default/index'));
    }

    public function errorAction()
    {
        return $this->render('error', [
            'exception' => Piko::get('exception')
        ]);
    }
}
