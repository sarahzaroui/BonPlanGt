<?php

namespace Back\BonPlanBackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackBonPlanBackBundle:Default:index.html.twig');
    }
}
