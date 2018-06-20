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
    public function newPromotionAction(Request $request,$idprod,$reduction,$deb,$fin)
    {
        //connexion
        $em = $this->getDoctrine()->getManager();

        $produit = $em->getRepository('FrontBonPlanBundle:Produit')->find($idprod);

        $promotion = new Promotion();
       // $promotion->setIdpromo(5);
        $promotion->setReduction($reduction);
      //  $promotion->setDatedeb(null);
       // $promotion->setDatefin(null);
        $promotion->setIdprod($produit);
        //affecter les champs

        $em->persist($promotion);
        $em->flush();

        $normalizer = new ObjectNormalizer();


        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $formatted= $serializer->normalize($promotion, 'json');
        return new JsonResponse($formatted);
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
