<?php
namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Categoriearticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;


class CategorieArticleApiController extends Controller
{
    public function getAllCategorieaArticleAction()
    {
        $categoriearticle=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Categoriearticle')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        /* $serializer = new Serializer(array($normalizer), array(new JsonEncoder()));*/
        $formatted= $serializer->normalize($categoriearticle, 'json');
        return new JsonResponse($formatted);
    }

}