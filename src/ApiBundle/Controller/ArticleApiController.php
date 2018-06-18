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
use Symfony\Component\HttpFoundation\Request;

class ArticleApiController extends Controller
{
    public function allArticleAction()
    {
        $article=$this->getDoctrine()->getRepository('FrontBonPlanBundle:Article')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $formatted= $serializer->normalize($article, 'json');
        return new JsonResponse($formatted);
    }
    public function newArticleAction(Request $request,$iduser,$idr,$idc,$titre,$description,$imagename,$adresse)
    {
        //connexion
        $em = $this->getDoctrine()->getManager();
        //get annonce and client object
        $user = $em->getRepository('FrontBonPlanBundle:User')->find($iduser);
        $categorie = $em->getRepository('FrontBonPlanBundle:Categoriearticle')->find($idc);
        $idr = $em->getRepository('FrontBonPlanBundle:Region')->find($idr);


        $article = new Article();
        //affecter les champs
        $article->setDate(new \DateTime('now'));
        $article->setIduser($user);
        $article->setIdcatart($categorie);
        $article->getIdregion($idr);
        $article->setAdresse($adresse);
        $article->setTitre($titre);
        $article->setDescription($description);
        $article->setImageName($imagename);
        $article->setUpdateAt(new \DateTime('now'));
        $em->persist($article);
        $em->flush();


        $normalizer = new ObjectNormalizer();

        $normalizer->setIgnoredAttributes(array('user'));
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $formatted= $serializer->normalize($article, 'json');
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