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
            // Honey pot detection
            if (!empty($_POST['email_2'])) {
                exit();
            }

            $form->bind($_POST);

            if ($form->validate() && $form->sendMessage()) {
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

        if (!empty($_POST)) {

            $userIdentity = User::findByUsername($_POST['username']);

            if ($userIdentity instanceof User) {
                if ($userIdentity->validatePassword($_POST['password'])) {
                    $user = Piko::get('user');
                    $user->login($userIdentity);
                    return Piko::$app->redirect('/');
                }
                $error = 'Auhtentication failed';
            } else {
                $error = 'Auhtentication failed';
            }
        }

        return $this->render('login', ['error' => $error]);
    }

    public function logoutAction()
    {
        $user = Piko::get('user');
        $user->logout();
        Piko::$app->redirect('/');
    }

    public function errorAction()
    {
        return $this->render('error', [
            'exception' => Piko::get('exception')
        ]);
    }
}