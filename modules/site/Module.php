<?php
namespace app\modules\site;

class Module extends \Piko\Module
{
    public function bootstrap()
    {
        // Pass some parameters to the View component
        $view = $this->application->getComponent('Piko\View');
        $view->params['user'] = $this->application->getComponent('Piko\User');
        $view->params['language'] = $this->application->language;
    }
}