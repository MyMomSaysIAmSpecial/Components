<?php

namespace Components\Controller;

class AppController extends BaseController
{
    public function indexAction()
    {
        return $this->render('It works!');
    }
}