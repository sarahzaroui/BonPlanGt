<?php

namespace Back\BonPlanBackBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $soirees = $em->getRepository('FrontBonPlanBundle:Reserver')
            ->upcoming();
        $soirees1 = $em->getRepository('FrontBonPlanBundle:Evennement')
            ->upcoming();
        $soirees2 = $em->getRepository('FrontBonPlanBundle:Evennement')
            ->nombreevent();

        $nbreservation = $em->getRepository('FrontBonPlanBundle:Reserver')
            ->nombrereservation();
        $nbrearticle = $em->getRepository('FrontBonPlanBundle:Article')
            ->nombrearticle();

        $nbreregion = $em->getRepository('FrontBonPlanBundle:Region')
            ->nombreregion();
        $listevent = $em->getRepository('FrontBonPlanBundle:Evennement')
            ->listevent();


        return $this->render('BackBonPlanBackBundle:Default:index.html.twig',array(
            'reservations'=>$soirees,'soirees'=>$soirees1,'events'=>$soirees2,'nbrreservations'=>$nbreservation,'articles'=>$nbrearticle,'regions'=>$nbreregion,'eventsList'=>$listevent
        ));

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
