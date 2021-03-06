<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Article;
use Front\BonPlanBundle\Entity\PubliciteArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 * @Route("article")
 */
class ArticleController extends Controller
{
    
    public function indexAction()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('FrontBonPlanBundle:Article')->findBy(array("iduser"=>$user));

        return $this->render('article/index.html.twig', array(
            'articles' => $articles,
        ));
    }

    
    public function newAction(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $article = new Article();
        $form = $this->createForm('Front\BonPlanBundle\Form\ArticleType', $article);
        $form->handleRequest($request);


        $user = $this->getUser();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $article->setIduser($user);
            $article->setDate(new \DateTime('now'));
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', array('idarticle' => $article->getIdarticle()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    
    public function showAction(Article $article)
    {

        $deleteForm = $this->createDeleteForm($article);
        $em = $this->getDoctrine()->getManager();


        $publiciteArticles = $em->getRepository('FrontBonPlanBundle:PubliciteArticle')->findBy(array("Article"=>$article));
        return $this->render('article/show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
            'publiciteArticles' => $publiciteArticles,
        ));
    }
    public function detailsAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/showAdmin.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', array('idarticle' => $article->getIdarticle()));
        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('idarticle' => $article->getIdarticle())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function indexAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('FrontBonPlanBundle:Article')->findAll();

        return $this->render('article/indexadmin.html.twig', array(
            'articles' => $articles,
        ));
    }

    public function activerAction (Request $request)
    {
        $id = $request->get('idarticle');
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('FrontBonPlanBundle:Article')->find($id);
        $article->SetEtat("publié");
        $em->persist($article);
        $em->flush();
        return $this->redirectToRoute('listarticles_admin');
    }

    public function desactiverAction (Request $request)
    {
        $id = $request->get('idarticle');
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('FrontBonPlanBundle:Article')->find($id);
        $article->SetEtat("trash");
        $em->persist($article);
        $em->flush();
        return $this->redirectToRoute('listarticles_admin');
    }

}
