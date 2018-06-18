<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 24/05/2018
 * Time: 23:31
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
class UserApiController extends Controller
{

    public function getUserAction($login, $password)
    {
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new   Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $user = $this->getDoctrine()->getManager()
            ->getRepository('FrontBonPlanBundle:User')
            ->findBy(array("username" => $login));
        $passwordEncoder = $this->get('security.password_encoder');
        if (!$passwordEncoder->isPasswordValid($user[0], $password, $user[0]->getSalt())) {
            $formatted = $serializer->normalize('erreur', 'json');
            return new JsonResponse($formatted);
        } else {
            $formatted = $serializer->normalize($user, 'json');
            return new JsonResponse($formatted);
        }
    }
    public function getAllUsersAction()
    {
        $users=$this->getDoctrine()->getRepository('FrontBonPlanBundle:User')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        /* $serializer = new Serializer(array($normalizer), array(new JsonEncoder()));*/
        $formatted= $serializer->normalize($users, 'json');
        return new JsonResponse($formatted);
    }
}