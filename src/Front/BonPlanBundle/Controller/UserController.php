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
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('FrontBonPlanBundle:User')->findAll();
        return $this->render('user/index.html.twig', array(
            'users' => $user,
        ));
    }
    public function activerAction (Request $request)
    {
        $id = $request->get('iduser');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('FrontBonPlanBundle:User')->find($id);
        $user->setEnabled(true);
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('listuser');
    }

    public function desactiverAction (Request $request)
    {
        $id = $request->get('iduser');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('FrontBonPlanBundle:User')->find($id);
        $user->setEnabled(false);
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('listuser');
    }
}