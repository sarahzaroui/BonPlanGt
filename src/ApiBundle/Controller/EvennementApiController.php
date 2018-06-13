<?php
/**
 * Created by PhpStorm.
 * User: Turki.Omar
 * Date: 10/06/2018
 * Time: 17:14
 */

namespace ApiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EvennementApiController extends Controller
{
    public function getAllEvennementAction()
    {
        $evennement=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Evennement')->findAll();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize($evennement);
        return new JsonResponse($formatted);
    }
}