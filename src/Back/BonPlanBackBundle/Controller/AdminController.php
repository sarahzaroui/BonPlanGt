<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 21/03/2018
 * Time: 20:16
 */

namespace Back\BonPlanBackBundle\Controller;
use AppBundle\Entity\Categoriearticle;
use AppBundle\Entity\Categorieevenement;
use AppBundle\Form\CategoriearticleType;
use AppBundle\Form\CategorieevenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function affichageAction()
    {
        return $this->render('BackBonPlanBackBundle:AdminTemp:admin.html.twig');
    }
     //test alaaeddine
    public function afficherAction()
    {
        //test
         $em = $this->getDoctrine()->getManager();
        $models = $em->getRepository("AppBundle:Categorieevenement")->findAll();
        return $this->render("BackBonPlanBackBundle:Categorieevenement:affichage.html.twig", array("modeles" => $models));
    }
    public function ajoutAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {

            $Idcate = $request->get('Idcate');
            $Nom = $request->get('Nom');
            $Categorieevenemnt = new Categorieevenement();
            $Categorieevenemnt->setIdcatev($Idcate);
            $Categorieevenemnt->setNom($Nom);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Categorieevenemnt);
            $em->flush();
            return $this->redirectToRoute('affichage_categorie_evenement');
        }

        return $this->render('BackBonPlanBackBundle:Categorieevenement:ajout.html.twig');
    }

    public function supprimerAction(Request $request)
    {
        $idcatev = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository("AppBundle:Categorieevenement")->find($idcatev);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('affichage_categorie_evenement');
    }
    public function updateAction(Request $request)
    {
        $idcatdev=$request->get('id');
        $em=$this->getDoctrine()->getManager();
        $modele = $em->getRepository("AppBundle:Categorieevenement")->find($idcatdev);
        $form=$this->createForm(CategorieevenementType::class,$modele);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('affichage_categorie_evenement');
        }


        return $this->render("BackBonPlanBackBundle:Categorieevenement:update.html.twig",array("Form"=>$form->createView()));

    }

    public function affichercatarticleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $models = $em->getRepository("AppBundle:Categoriearticle")->findAll();
        return $this->render("BackBonPlanBackBundle:Categoriearticle:affichage.html.twig", array("modeles" => $models));
    }
    public function ajoutCatArticleAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {

            $Idcatart = $request->get('Idcatart');
            $Nom = $request->get('Nom');
            $Categoriearticle = new Categoriearticle();
            $Categoriearticle->setIdcatart($Idcatart);
            $Categoriearticle->setNom($Nom);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Categoriearticle);
            $em->flush();
            return $this->redirectToRoute('affichage_categorie_article');
        }

        return $this->render('BackBonPlanBackBundle:Categoriearticle:ajout.html.twig');
    }

    public function updateArticleAction(Request $request)
    {
        $idcatart=$request->get('id');
        $em=$this->getDoctrine()->getManager();
        $modele = $em->getRepository("AppBundle:Categoriearticle")->find($idcatart);
        $form=$this->createForm(CategoriearticleType::class,$modele);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('affichage_categorie_article');
        }


        return $this->render("BackBonPlanBackBundle:Categoriearticle:update.html.twig",array("Form"=>$form->createView()));

    }


    public function supprimerCatArticleAction(Request $request)
    {
        $idcatart = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository("AppBundle:Categoriearticle")->find($idcatart);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('affichage_categorie_article');
    }




}