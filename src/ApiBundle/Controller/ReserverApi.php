<?php
/**
 * Created by PhpStorm.
 * User: Turki.Omar
 * Date: 08/06/2018
 * Time: 13:38
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Reserver;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

class ReserverApi extends Controller
{
    public function getAllArticleAction()
    {
        $article=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Reserver')->findAll();

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