<?php

namespace Back\BonPlanBackBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackBonPlanBackBundle:Default:index.html.twig');
    }
    public function prestataireAction()
    {

        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('FrontBonPlanBundle:Article')->findAll();

        return $this->render('article/index.html.twig', array(
            'articles' => $articles,
        ));
    }
}
