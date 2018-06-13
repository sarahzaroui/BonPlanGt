<?php
/**
 * Created by PhpStorm.
 * User: Turki.Omar
 * Date: 08/06/2018
 * Time: 00:41
 */

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Evennement;
use Front\BonPlanBundle\Entity\Reserver;
use Front\BonPlanBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class UserController extends Controller
{
    public function userAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservers = $em->getRepository('FrontBonPlanBundle:Reserver')->findAll();

        return $this->render('FrontBonPlanBundle:Default:user.html.twig', array(
            'reservers' => $reservers,
        ));
    }
}