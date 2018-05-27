<?php

namespace Front\BonPlanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('FrontBonPlanBundle:Article')->findAllOrderedByDate();

        return $this->render('FrontBonPlanBundle:Default:index.html.twig', array(
            'articles' => $articles,
        ));
    }
    public function menuAction()
    {
        return $this->render('FrontBonPlanBundle:Default:menu.html.twig');
    }
    public function blogAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		
         $gategories = $em->getRepository('FrontBonPlanBundle:Categoriearticle')->findAll();
         $articles = $em->getRepository('FrontBonPlanBundle:Article')->findAllOrderedByDate();
		 if($request->getMethod()=="POST")
        {
			 $p=$request->get('search');
			$articles = $em->getRepository('FrontBonPlanBundle:Article')->findByName($p);
		}

        return $this->render('FrontBonPlanBundle:Default:blog.html.twig', array(
            'articles' => $articles,'categories' => $gategories,
        ));
    }
    public function singleAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('FrontBonPlanBundle:Article')->find($id);


        return $this->render('FrontBonPlanBundle:Default:single.html.twig', array(
            'article' => $article,
        ));

    }
    public function eventsAction()
    {
        return $this->render('FrontBonPlanBundle:Default:events.html.twig');
    }
    public function contactAction()
    {
        return $this->render('FrontBonPlanBundle:Default:contact.html.twig');
    }
    public function loginAction()
    {
        return $this->render('FrontBonPlanBundle:Default:login.html.twig');
    }
    public function registerAction()
    {
        return $this->render('FOSUserBundle:Registration:register.html.twig');
    }
    public function articlesCategoryAction($id,Request $request)
	{
		
		$em = $this->getDoctrine()->getManager();
		$cat = $em->getRepository('FrontBonPlanBundle:Categoriearticle')->find($id);
         $gategories = $em->getRepository('FrontBonPlanBundle:Categoriearticle')->findAll();
         $articles = $em->getRepository('FrontBonPlanBundle:Article')->findBy(array('idcatart' => $cat,'etat'=>'publié'));
		 if($request->getMethod()=="POST")
        {
			 $p=$request->get('search');
			$articles = $em->getRepository('FrontBonPlanBundle:Article')->findByName($p);
		}

        return $this->render('FrontBonPlanBundle:Default:blog.html.twig', array(
            'articles' => $articles,'categories' => $gategories,
        ));
	}
}
