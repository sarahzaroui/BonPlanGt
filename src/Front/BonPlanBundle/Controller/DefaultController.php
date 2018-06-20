<?php

namespace Front\BonPlanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Front\BonPlanBundle\Entity\Newsletter;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
       $updateEtatPublicite = $em->getRepository('FrontBonPlanBundle:PubliciteArticle')->updatePub();
        $Newsletter = new Newsletter();

        $type = $request->get('type');

        if($request->getMethod()=="POST" && $type=="recherche")
        {

          $p=$request->get('search');
           $gategories = $em->getRepository('FrontBonPlanBundle:Categoriearticle')->findAll();
            $articles = $em->getRepository('FrontBonPlanBundle:Article')->findByName($p);
            $articles1 = $em->getRepository('FrontBonPlanBundle:Article')->findAllSideBar();


           return $this->render('FrontBonPlanBundle:Default:blog.html.twig', array(
               'articles' => $articles,'categories' => $gategories,'articles1' => $articles1));
     }
     else if($request->getMethod()=="POST" && $type=="nl"){
         $mail=$request->get('email');
         $emnews = $this->getDoctrine()->getManager()->getRepository('FrontBonPlanBundle:Newsletter')->findBy(array('mailinter'=>$mail));
         if ($emnews==null)
         {
             $Newsletter->setMailinter($mail);
             $em->persist($Newsletter);
             $em->flush();

             return $this->render('FrontBonPlanBundle:Default:inscrinews.html.twig');
         }
         else
         {
             return $this->render('FrontBonPlanBundle:Default:alertnews.html.twig');
         }

     }


        $articles = $em->getRepository('FrontBonPlanBundle:Article')->findAllOrderedByDate();

        $pub = $em->getRepository('FrontBonPlanBundle:PubliciteArticle')->findAllSponsored();
        $produits = $em->getRepository('FrontBonPlanBundle:Produit')->findAll();
        $promotions = $em->getRepository('FrontBonPlanBundle:Promotion')->findLastPromo();

        return $this->render('FrontBonPlanBundle:Default:index.html.twig', array(

            'articles' => $articles,'pubs'=> $pub,
            'promotions' => $promotions,
            'produits' => $produits));

    }
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('FrontBonPlanBundle:Evennement')->findAll();

        return $this->render('FrontBonPlanBundle:Default:menu.html.twig', array(
            'events' => $events
        ));
    }
    public function ratingAction()
    {
        $form = $this->createForm('Front\BonPlanBundle\Form\RatingType');

        return $this->render('FrontBonPlanBundle:Default:rating.html.twig', array(
            'formrating' => $form->createView()
        ));
    }
    public function blogAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
		
         $gategories = $em->getRepository('FrontBonPlanBundle:Categoriearticle')->findAll();
         $articles = $em->getRepository('FrontBonPlanBundle:Article')->findAllOrderedByDate();
        $articles1 = $em->getRepository('FrontBonPlanBundle:Article')->findAllSideBar();
		 if($request->getMethod()=="POST")
        {
			 $p=$request->get('search');
			$articles = $em->getRepository('FrontBonPlanBundle:Article')->findByName($p);
		}

        return $this->render('FrontBonPlanBundle:Default:blog.html.twig', array(
            'articles' => $articles,'categories' => $gategories, 'articles1' => $articles1,
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
    public function singleProduitAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $produit = $em->getRepository('FrontBonPlanBundle:Produit')->find($id);
        $promotion = $em->getRepository('FrontBonPlanBundle:Promotion')->getPromoByProduct($id);
        $info = array(
            'promotion' => $promotion,
            'produit' => $produit);
        return $this->render('FrontBonPlanBundle:Default:produitSingle.html.twig',$info);

    }
    public function eventsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('FrontBonPlanBundle:Evennement')->find($id);


        return $this->render('FrontBonPlanBundle:Default:events.html.twig', array(
            'event' => $event,
        ));
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
        $articles1 = $em->getRepository('FrontBonPlanBundle:Article')->findAllSideBar();
		 if($request->getMethod()=="POST")
        {
			 $p=$request->get('search');
			$articles = $em->getRepository('FrontBonPlanBundle:Article')->findByName($p);
		}

        return $this->render('FrontBonPlanBundle:Default:blog.html.twig', array(
            'articles' => $articles,'categories' => $gategories,'articles1'=>$articles1,
        ));
	}
    public function voterAction (Request $request)
    {

        return $this->redirectToRoute('FrontBonPlanBundle:Default:single.html.twig');
    }

    // view all product at the front

    public function indexfrontAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('FrontBonPlanBundle:Produit')->findAll();

        return $this->render('FrontBonPlanBundle:Default:produitMultp.html.twig', array(
            'produits' => $produits,
        ));
    }
}
