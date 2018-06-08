<?php
/**
 * Created by PhpStorm.
 * User: Turki.Omar
 * Date: 08/06/2018
 * Time: 13:37
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Evennement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;


class EvenementApi extends Controller
{
    public function getAllEvenementAction()
    {
        $article=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Evennement')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        /* $serializer = new Serializer(array($normalizer), array(new JsonEncoder()));*/
        $formatted= $serializer->normalize($article, 'json');
        return new JsonResponse($formatted);
    }
}