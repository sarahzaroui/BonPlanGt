<?php
namespace Front\BonPlanBundle\Controller;


use Front\BonPlanBundle\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegionController extends Controller

{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $regions = $em->getRepository('FrontBonPlanBundle:Region')->findBy(array("etat"=>"publié"));

        return $this->render('region/index.html.twig', array(
            'regions' => $regions,
        ));
    }







    public function newAction(Request $request)
    {
        $region = new Region();
        $form = $this->createForm('Front\BonPlanBundle\Form\RegionType', $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($region);
            $em->flush();

            return $this->redirectToRoute('region_show', array('idregion' => $region->getIdregion()));
        }

        return $this->render('region/new.html.twig', array(
            'region' => $region,
            'form' => $form->createView(),
        ));
    }
    public function showAction(Region $region)
    {
        $deleteForm = $this->createDeleteForm($region);

        return $this->render('region/show.html.twig', array(
            'region' => $region,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function editAction(Request $request, Region $region)
    {
        $deleteForm = $this->createDeleteForm($region);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\RegionType', $region);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('region_edit', array('idregion' => $region->getIdregion()));
        }

        return $this->render('region/edit.html.twig', array(
            'region' => $region,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, Region $region)
    {
        $em = $this->getDoctrine()->getManager();
        $region -> setEtat("supprimé");
        $em->persist($region);
        $em->flush();


        return $this->redirectToRoute('region_index');

    }
    private function createDeleteForm(Region $region)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('region_delete', array('idregion' => $region->getIdregion())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

}