<?php
/**
 * Created by PhpStorm.
 * User: Turki.Omar
 * Date: 08/06/2018
 * Time: 13:38
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Reserver;
use Front\BonPlanBundle\Entity\Evennement;
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

    public function newReservationAction($idevent)
    {
        $em = $this->getDoctrine()->getManager();
        $nvlleRes= new Reserver();
        $user = $this->getUser();
        $event = $em->getRepository('FrontBonPlanBundle:Evennement')->find($idevent);
        //$nvlleRes->setClient($user);
        $nvlleRes->setIdev($event);
        $nvlleRes->setDate(new \DateTime('now'));
        $serializer = SerializerBuilder::create()->build();
        $formatted = $serializer->serialize($nvlleRes, 'json');
        return new JsonResponse($formatted);
    }


    public function createreservationAction(Request $request,$evennement,$date,$nbrePlace,$user)
    {
        //connexion
        $em = $this->getDoctrine()->getManager();
        //get annonce and client object
        $user = $em->getRepository('FrontBonPlanBundle:User')->find($user);
        $event = $em->getRepository('FrontBonPlanBundle:Evennement')->find($evennement);
        //instance réserver
        $Reserver= new Reserver();
        //affecter les champs
        $Reserver->setIdev($event);
        $Reserver->getIduser($user);
        $Reserver->setNbrePlaces($nbrePlace);
        $Reserver->setDate(new \DateTime($date));
        $em->persist($Reserver);
        $em->flush();
        //format date
        $callback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format('Y-m-d')
                : '';
        };
        $normalizer = new ObjectNormalizer();
        //ne pas envoyer client,annonce,commentaires dans le retour json
        $normalizer->setIgnoredAttributes(array('user','evennement','reserver'));
        $normalizer->setCallbacks(array('Date' => $callback));
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $formatted= $serializer->normalize($Reserver, 'json');
        return new JsonResponse($formatted);
    }
}