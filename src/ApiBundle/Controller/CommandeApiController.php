<?php
namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class CommandeApiController extends Controller
{
    public function allCommandeAction()
    {
        $article=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Produit')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);

        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($article, 'json');
        return new JsonResponse($formatted);
    }
    public function newCommandeAction(Request $request,$iduser,$idprod,$qtecmd)
    {
        //connexion
        $em = $this->getDoctrine()->getManager();
        //get annonce and client object
        $user = $em->getRepository('FrontBonPlanBundle:User')->find($iduser);
        $prod = $em->getRepository('FrontBonPlanBundle:Produit')->find($idprod);



        $commande = new Commande();
        //affecter les champs
       $commande->setDatecmd(new \DateTime('now'));
$commande->setIduser($user);
        $commande->setIdprod($prod);
        $commande->setQtecmd($qtecmd);
        $em->persist($commande);
        $em->flush();


        $normalizer = new ObjectNormalizer();

        $normalizer->setIgnoredAttributes(array('user'));
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $formatted= $serializer->normalize($commande, 'json');
        return new JsonResponse($formatted);
    }

    public function articleAction(Request $request,$idArticle)
    {
        $article=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Article')->find($idArticle);
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($article, 'json');
        return new JsonResponse($formatted);
    }
    public function articleByUserAction(Request $request,$idUser)
    {
        $article=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Article')->findBy(array('idUser'=>$idUser));
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($article, 'json');
        return new JsonResponse($formatted);
    }
}