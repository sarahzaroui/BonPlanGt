<?php

namespace ApiBundle\Controller;

use Front\BonPlanBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Front\BonPlanBundle\Entity\Produit;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Promotion controller.
 *
 */
class PromotionApiController extends Controller
{
    /**
     * Lists all promotion entities.
     *
     */
    public function allPromotionsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $promotions = $em->getRepository('FrontBonPlanBundle:Promotion')->findLastPromo();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($promotions, 'json');
        return new JsonResponse($formatted);
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
    public function detailsPromoAction($idprod)
    {
        $em = $this->getDoctrine()->getManager();

        $promotion = $em->getRepository('FrontBonPlanBundle:Promotion')->getPromoByProduct($idprod);

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($promotion, 'json');
        return new JsonResponse($formatted);
    }

    public function produitPromoAction($nom)
    {
        $em = $this->getDoctrine()->getManager();




            $produit = $em->getRepository('FrontBonPlanBundle:Produit')->findProduitPromotionByName($nom);


        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($produit, 'json');
        return new JsonResponse($formatted);
    }

    public function allProdPromotionsAction()
    {
        $em = $this->getDoctrine()->getManager();




        $produits = $em->getRepository('FrontBonPlanBundle:Produit')->findAllProdPromotions();


        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($produits, 'json');
        return new JsonResponse($formatted);
    }


}
