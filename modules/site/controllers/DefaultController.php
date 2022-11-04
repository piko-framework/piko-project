<?php
namespace app\modules\site\controllers;

use Piko\User;
use app\modules\site\models\ContactForm;
use app\modules\site\models\UserIdentity;
use Throwable;

class DefaultController extends \Piko\Controller
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

        if ($this->request->getMethod() == 'POST') {
            $form->bind($this->request->getParsedBody());

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

        if ($this->request->getMethod() == 'POST') {
            $post = $this->request->getParsedBody();
            $userIdentity = UserIdentity::findByUsername($post['username']);

            if ($userIdentity instanceof UserIdentity && $userIdentity->validatePassword($post['password'])) {
                $user = $this->getUser();
                $user->login($userIdentity);

                return $this->redirect($this->getUrl('site/default/index'));
            }

            $error = 'Auhtentication failed';
        }

        return $this->render('login', ['error' => $error]);
    }

    public function logoutAction()
    {
        $user = $this->getUser();
        $user->logout();
        $this->redirect($this->getUrl('site/default/index'));
    }

    public function errorAction(Throwable $exception)
    {
        return $this->render('error', [
            'exception' => $exception
        ]);
    }

    private function getUser(): User
    {
        return $this->module->getApplication()->getComponent(User::class);
    }
}
