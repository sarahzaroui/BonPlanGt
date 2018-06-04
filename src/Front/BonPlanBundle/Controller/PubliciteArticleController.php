<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\PubliciteArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Publicitearticle controller.
 *
 */
class PubliciteArticleController extends Controller
{
    /**
     * Lists all publiciteArticle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publiciteArticles = $em->getRepository('FrontBonPlanBundle:PubliciteArticle')->findAll();

        return $this->render('publicitearticle/index.html.twig', array(
            'publiciteArticles' => $publiciteArticles,
        ));
    }

    /**
     * Creates a new publiciteArticle entity.
     *
     */
    public function newAction(Request $request)
    {
        $publiciteArticle = new Publicitearticle();
        $form = $this->createForm('Front\BonPlanBundle\Form\PubliciteArticleType', $publiciteArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($publiciteArticle);
            $em->flush();

            return $this->redirectToRoute('publicitearticle_show', array('id' => $publiciteArticle->getId()));
        }

        return $this->render('publicitearticle/new.html.twig', array(
            'publiciteArticle' => $publiciteArticle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a publiciteArticle entity.
     *
     */
    public function showAction(PubliciteArticle $publiciteArticle)
    {
        $deleteForm = $this->createDeleteForm($publiciteArticle);

        return $this->render('publicitearticle/show.html.twig', array(
            'publiciteArticle' => $publiciteArticle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing publiciteArticle entity.
     *
     */
    public function editAction(Request $request, PubliciteArticle $publiciteArticle)
    {
        $deleteForm = $this->createDeleteForm($publiciteArticle);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\PubliciteArticleType', $publiciteArticle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('publicitearticle_edit', array('id' => $publiciteArticle->getId()));
        }

        return $this->render('publicitearticle/edit.html.twig', array(
            'publiciteArticle' => $publiciteArticle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a publiciteArticle entity.
     *
     */
    public function deleteAction(Request $request, PubliciteArticle $publiciteArticle)
    {
        $form = $this->createDeleteForm($publiciteArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($publiciteArticle);
            $em->flush();
        }

        return $this->redirectToRoute('publicitearticle_index');
    }

    /**
     * Creates a form to delete a publiciteArticle entity.
     *
     * @param PubliciteArticle $publiciteArticle The publiciteArticle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PubliciteArticle $publiciteArticle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('publicitearticle_delete', array('id' => $publiciteArticle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
