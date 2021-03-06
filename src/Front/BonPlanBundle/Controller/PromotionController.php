<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Front\BonPlanBundle\Entity\Produit;

/**
 * Promotion controller.
 *
 */
class PromotionController extends Controller
{
    /**
     * Lists all promotion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promotions = $em->getRepository('FrontBonPlanBundle:Promotion')->findAll();

        return $this->render('promotion/index.html.twig', array(
            'promotions' => $promotions,
        ));
    }

    /**
     * Creates a new promotion entity.
     *
     */
    public function newAction(Request $request)
    {
        $promotion = new Promotion();
        $form = $this->createForm('Front\BonPlanBundle\Form\PromotionType', $promotion);
        $form->handleRequest($request);
        $retour=0;
        $currentdate=new \DateTime("now");

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $promotions = $em->getRepository('FrontBonPlanBundle:Promotion')->findAll();
               foreach($promotions as $promo){
                   if($promotion->getDatefin() >= $currentdate && $promotion->getIdprod()->getIdproduit() == $promo->getIdprod()->getIdproduit() && $promotion->getDatedeb()<=$promo->getDatefin()){

                       $retour=1;
                   }

               }

            if($retour==0){

                $em->persist($promotion);
                $em->flush();

                return $this->redirectToRoute('promotion_show', array('idpromo' => $promotion->getIdpromo()));
            }
        }
        $info = array(
            'promotion' => $promotion,
            'form' => $form->createView(),
            'currentdate' => $currentdate,
            'retour' => $retour);
        return $this->render('promotion/new.html.twig',$info);
    }

    /**
     * Finds and displays a promotion entity.
     *
     */
    public function showAction(Promotion $promotion)
    {
        $deleteForm = $this->createDeleteForm($promotion);

        return $this->render('promotion/show.html.twig', array(
            'promotion' => $promotion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing promotion entity.
     *
     */
    public function editAction(Request $request, Promotion $promotion)
    {
        $deleteForm = $this->createDeleteForm($promotion);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\PromotionType', $promotion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('promotion_edit', array('idpromo' => $promotion->getIdpromo()));
        }

        return $this->render('promotion/edit.html.twig', array(
            'promotion' => $promotion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a promotion entity.
     *
     */
    public function deleteAction(Request $request, Promotion $promotion)
    {
        $form = $this->createDeleteForm($promotion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($promotion);
            $em->flush();
        }

        return $this->redirectToRoute('promotion_index');
    }

    /**
     * Creates a form to delete a promotion entity.
     *
     * @param Promotion $promotion The promotion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Promotion $promotion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('promotion_delete', array('idpromo' => $promotion->getIdpromo())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function detailsPromoAction($idprod,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nom=$request->get('search');
        $promotion = $em->getRepository('FrontBonPlanBundle:Promotion')->getPromoByProduct($idprod);
        $produit = $em->getRepository('FrontBonPlanBundle:Produit')->find($idprod);
        if($nom !="" ){
            $produits = $em->getRepository('FrontBonPlanBundle:Produit')->findProduitPromotionByName($nom);

        }else {
            $produits = $em->getRepository('FrontBonPlanBundle:Produit')->findAllProductsPromotions($idprod);
        }
        $info = array(

            'promotion' => $promotion,
            'produit' => $produit,
            'produits' => $produits);
        return $this->render('FrontBonPlanBundle:Default:promotion.html.twig', $info);
    }

}
