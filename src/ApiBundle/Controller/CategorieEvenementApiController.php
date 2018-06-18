<?php
/**
 * Created by PhpStorm.
 * User: WADII_ADMIN
 * Date: 08/06/2018
 * Time: 00:10
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Categorieevenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;




class CategorieEvenementApiController extends Controller
{
    public function getAllCategorieaEvenementAction()
    {
        $categorieevenement=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Categorieevenement')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        /* $serializer = new Serializer(array($normalizer), array(new JsonEncoder()));*/
        $formatted= $serializer->normalize($categorieevenement, 'json');
        return new JsonResponse($formatted);
    }
}