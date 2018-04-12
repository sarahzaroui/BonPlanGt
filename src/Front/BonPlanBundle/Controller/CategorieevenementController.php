<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Categorieevenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorieevenement controller.
 *
 */
class CategorieevenementController extends Controller
{
    /**
     * Lists all categorieevenement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorieevenements = $em->getRepository('FrontBonPlanBundle:Categorieevenement')->findAll();

        return $this->render('categorieevenement/index.html.twig', array(
            'categorieevenements' => $categorieevenements,
        ));
    }

    /**
     * Creates a new categorieevenement entity.
     *
     */
    public function newAction(Request $request)
    {
        $categorieevenement = new Categorieevenement();
        $form = $this->createForm('Front\BonPlanBundle\Form\CategorieevenementType', $categorieevenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieevenement);
            $em->flush();

            return $this->redirectToRoute('categorieevenement_show', array('idcatev' => $categorieevenement->getIdcatev()));
        }

        return $this->render('categorieevenement/new.html.twig', array(
            'categorieevenement' => $categorieevenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorieevenement entity.
     *
     */
    public function showAction(Categorieevenement $categorieevenement)
    {
        $deleteForm = $this->createDeleteForm($categorieevenement);

        return $this->render('categorieevenement/show.html.twig', array(
            'categorieevenement' => $categorieevenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorieevenement entity.
     *
     */
    public function editAction(Request $request, Categorieevenement $categorieevenement)
    {
        $deleteForm = $this->createDeleteForm($categorieevenement);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\CategorieevenementType', $categorieevenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorieevenement_edit', array('idcatev' => $categorieevenement->getIdcatev()));
        }

        return $this->render('categorieevenement/edit.html.twig', array(
            'categorieevenement' => $categorieevenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorieevenement entity.
     *
     */
    public function deleteAction(Request $request, Categorieevenement $categorieevenement)
    {
        $form = $this->createDeleteForm($categorieevenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieevenement);
            $em->flush();
        }

        return $this->redirectToRoute('categorieevenement_index');
    }

    /**
     * Creates a form to delete a categorieevenement entity.
     *
     * @param Categorieevenement $categorieevenement The categorieevenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Categorieevenement $categorieevenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorieevenement_delete', array('idcatev' => $categorieevenement->getIdcatev())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
