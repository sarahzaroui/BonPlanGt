<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 24/05/2018
 * Time: 23:32
 */

namespace ApiBundle\Controller;
use Front\BonPlanBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleApiController extends Controller
{
    public function getAllArticleAction()
    {
        $article=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Article')->findAll();

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