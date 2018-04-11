<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Categoriearticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categoriearticle controller.
 *
 */
class CategoriearticleController extends Controller
{
    /**
     * Lists all categoriearticle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriearticles = $em->getRepository('FrontBonPlanBundle:Categoriearticle')->findAll();

        return $this->render('categoriearticle/index.html.twig', array(
            'categoriearticles' => $categoriearticles,
        ));
    }

    /**
     * Creates a new categoriearticle entity.
     *
     */
    public function newAction(Request $request)
    {
        $categoriearticle = new Categoriearticle();
        $form = $this->createForm('Front\BonPlanBundle\Form\CategoriearticleType', $categoriearticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoriearticle);
            $em->flush();

            return $this->redirectToRoute('categoriearticle_show', array('idcatart' => $categoriearticle->getIdcatart()));
        }

        return $this->render('categoriearticle/new.html.twig', array(
            'categoriearticle' => $categoriearticle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categoriearticle entity.
     *
     */
    public function showAction(Categoriearticle $categoriearticle)
    {
        $deleteForm = $this->createDeleteForm($categoriearticle);

        return $this->render('categoriearticle/show.html.twig', array(
            'categoriearticle' => $categoriearticle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categoriearticle entity.
     *
     */
    public function editAction(Request $request, Categoriearticle $categoriearticle)
    {
        $deleteForm = $this->createDeleteForm($categoriearticle);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\CategoriearticleType', $categoriearticle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoriearticle_edit', array('idcatart' => $categoriearticle->getIdcatart()));
        }

        return $this->render('categoriearticle/edit.html.twig', array(
            'categoriearticle' => $categoriearticle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categoriearticle entity.
     *
     */
    public function deleteAction(Request $request, Categoriearticle $categoriearticle)
    {
        $form = $this->createDeleteForm($categoriearticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categoriearticle);
            $em->flush();
        }

        return $this->redirectToRoute('categoriearticle_index');
    }

    /**
     * Creates a form to delete a categoriearticle entity.
     *
     * @param Categoriearticle $categoriearticle The categoriearticle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Categoriearticle $categoriearticle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoriearticle_delete', array('idcatart' => $categoriearticle->getIdcatart())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
