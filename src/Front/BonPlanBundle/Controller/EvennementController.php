<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Evennement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Evennement controller.
 *
 */
class EvennementController extends Controller
{
    /**
     * Lists all evennement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evennements = $em->getRepository('FrontBonPlanBundle:Evennement')->findAll();

        return $this->render('evennement/index.html.twig', array(
            'evennements' => $evennements,
        ));
    }

    /**
     * Creates a new evennement entity.
     *
     */
    public function newAction(Request $request)
    {
        $evennement = new Evennement();
        $form = $this->createForm('Front\BonPlanBundle\Form\EvennementType', $evennement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evennement);
            $em->flush();

            return $this->redirectToRoute('evennement_show', array('idev' => $evennement->getIdev()));
        }

        return $this->render('evennement/new.html.twig', array(
            'evennement' => $evennement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evennement entity.
     *
     */
    public function showAction(Evennement $evennement)
    {
        $deleteForm = $this->createDeleteForm($evennement);

        return $this->render('evennement/show.html.twig', array(
            'evennement' => $evennement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evennement entity.
     *
     */
    public function editAction(Request $request, Evennement $evennement)
    {
        $deleteForm = $this->createDeleteForm($evennement);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\EvennementType', $evennement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evennement_edit', array('idev' => $evennement->getIdev()));
        }

        return $this->render('evennement/edit.html.twig', array(
            'evennement' => $evennement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evennement entity.
     *
     */
    public function deleteAction(Request $request, Evennement $evennement)
    {
        $form = $this->createDeleteForm($evennement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evennement);
            $em->flush();
        }

        return $this->redirectToRoute('evennement_index');
    }

    /**
     * Creates a form to delete a evennement entity.
     *
     * @param Evennement $evennement The evennement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evennement $evennement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evennement_delete', array('idev' => $evennement->getIdev())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
