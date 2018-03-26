<?php

namespace Front\BonPlanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontBonPlanBundle:Default:index.html.twig');
    }
    public function menuAction()
    {
        return $this->render('FrontBonPlanBundle:Default:menu.html.twig');
    }
    public function blogAction()
    {
        return $this->render('FrontBonPlanBundle:Default:blog.html.twig');
    }
    public function singleAction()
    {
        return $this->render('FrontBonPlanBundle:Default:single.html.twig');
    }
    public function eventsAction()
    {
        return $this->render('FrontBonPlanBundle:Default:events.html.twig');
    }
    public function contactAction()
    {
        return $this->render('FrontBonPlanBundle:Default:contact.html.twig');
    }
}
