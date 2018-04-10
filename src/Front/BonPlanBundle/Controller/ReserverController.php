<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Reserver;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reserver controller.
 *
 */
class ReserverController extends Controller
{
    /**
     * Lists all reserver entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservers = $em->getRepository('FrontBonPlanBundle:Reserver')->findAll();

        return $this->render('reserver/index.html.twig', array(
            'reservers' => $reservers,
        ));
    }

    /**
     * Creates a new reserver entity.
     *
     */
    public function newAction(Request $request)
    {
        $reserver = new Reserver();
        $form = $this->createForm('Front\BonPlanBundle\Form\ReserverType', $reserver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reserver);
            $em->flush();

            return $this->redirectToRoute('reserver_show', array('idreservation' => $reserver->getIdreservation()));
        }

        return $this->render('reserver/new.html.twig', array(
            'reserver' => $reserver,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reserver entity.
     *
     */
    public function showAction(Reserver $reserver)
    {
        $deleteForm = $this->createDeleteForm($reserver);

        return $this->render('reserver/show.html.twig', array(
            'reserver' => $reserver,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reserver entity.
     *
     */
    public function editAction(Request $request, Reserver $reserver)
    {
        $deleteForm = $this->createDeleteForm($reserver);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\ReserverType', $reserver);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reserver_edit', array('idreservation' => $reserver->getIdreservation()));
        }

        return $this->render('reserver/edit.html.twig', array(
            'reserver' => $reserver,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reserver entity.
     *
     */
    public function deleteAction(Request $request, Reserver $reserver)
    {
        $form = $this->createDeleteForm($reserver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reserver);
            $em->flush();
        }

        return $this->redirectToRoute('reserver_index');
    }

    /**
     * Creates a form to delete a reserver entity.
     *
     * @param Reserver $reserver The reserver entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reserver $reserver)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reserver_delete', array('idreservation' => $reserver->getIdreservation())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
