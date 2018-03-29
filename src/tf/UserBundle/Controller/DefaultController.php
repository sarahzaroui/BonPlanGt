<?php

namespace tf\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('tfUserBundle:Default:index.html.twig');
    }
}
