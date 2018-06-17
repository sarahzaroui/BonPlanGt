<?php
/**
 * Created by PhpStorm.
 * User: WADII_ADMIN
 * Date: 07/06/2018
 * Time: 23:58
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegionApiController extends Controller
{

    public function getAllRegionAction()
    {
        $region=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Region')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        /* $serializer = new Serializer(array($normalizer), array(new JsonEncoder()));*/
        $formatted= $serializer->normalize($region, 'json');
        return new JsonResponse($formatted);
    }
}