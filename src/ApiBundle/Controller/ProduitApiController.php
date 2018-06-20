<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 19/06/2018
 * Time: 00:57
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProduitApiController extends Controller
{
    public function allProduitAction()
    {
        $produit=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Produit')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($produit, 'json');
        return new JsonResponse($formatted);
    }
    public function newProduitAction(Request $request,$idprestataire,$nom,$qte,$prix,$detail,$imagename,$adresse)
    {
        //connexion
        $em = $this->getDoctrine()->getManager();

        $prestatiare = $em->getRepository('FrontBonPlanBundle:User')->find($idprestataire);



       $produit = new Produit();
       $produit->setAdresse($adresse);
       $produit->setDetailpdt($detail);
       $produit->setIdprestataire($prestatiare);
       $produit->setImageName($imagename);
       $produit->setNompdt($nom);
       $produit->setPrix($prix);
       $produit->setQtedispo($qte);
        //affecter les champs


        $normalizer = new ObjectNormalizer();

        $normalizer->setIgnoredAttributes(array('user'));
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $formatted= $serializer->normalize($produit, 'json');
        return new JsonResponse($formatted);
    }

    public function produitAction(Request $request,$idpoduit)
    {
        $produit=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Produit')->find($idpoduit);
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($produit, 'json');
        return new JsonResponse($formatted);
    }
    public function produitByPrestAction(Request $request,$idprestataire)
    {
        $produit=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Produit')->findBy(array('idprestataire'=>$idprestataire));
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($produit, 'json');
        return new JsonResponse($formatted);
    }

}