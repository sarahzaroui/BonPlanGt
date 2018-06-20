<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Publicite;
use Front\BonPlanBundle\Entity\PubliciteArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Publicite controller.
 *
 */
class PubliciteController extends Controller
{
    /**
     * Lists all publicite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publicites = $em->getRepository('FrontBonPlanBundle:Publicite')->findBy(array("etat"=>"publié"));
        $publiciteArticles = $em->getRepository('FrontBonPlanBundle:PubliciteArticle')->findBy(array("etat"=>array("en attente","validée")));
        
        return $this->render('publicite/index.html.twig', array(
            'publicites' => $publicites,
            'publiciteArticles' => $publiciteArticles,
        ));
    }

    /**
     * Creates a new publicite entity.
     *
     */
    public function newAction(Request $request)
    {
        $publicite = new Publicite();
        $form = $this->createForm('Front\BonPlanBundle\Form\PubliciteType', $publicite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($publicite);
            $em->flush();

            return $this->redirectToRoute('publicite_show', array('idpublicite' => $publicite->getIdpublicite()));
        }

        return $this->render('publicite/new.html.twig', array(
            'publicite' => $publicite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a publicite entity.
     *
     */
    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->get('idpublicite');

        $publicite = $em->getRepository('FrontBonPlanBundle:Publicite')->find($id);



        return $this->render('publicite/show.html.twig', array(
            'publicite' => $publicite,

        ));
    }

    /**
     * Displays a form to edit an existing publicite entity.
     *
     */
    public function editAction(Request $request, Publicite $publicite)
    {
        $em = $this->getDoctrine()->getManager();
        $publicite->SetEtat("supprimer");
        $em->persist($publicite);
        $em->flush();
        return $this->redirectToRoute('publicite_index');
    }

    /**
     * Deletes a publicite entity.
     *
     */
    public function deleteAction(Request $request, Publicite $publicite)
    {
        $form = $this->createDeleteForm($publicite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($publicite);
            $em->flush();
        }

        return $this->redirectToRoute('publicite_index');
    }

    /**
     * Creates a form to delete a publicite entity.
     *
     * @param Publicite $publicite The publicite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Publicite $publicite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('publicite_delete', array('idpublicite' => $publicite->getIdpublicite())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
