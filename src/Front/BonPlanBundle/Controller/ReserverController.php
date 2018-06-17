<?php

namespace Front\BonPlanBundle\Controller;

use Front\BonPlanBundle\Entity\Evennement;
use Front\BonPlanBundle\Entity\Reserver;
use Front\BonPlanBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;

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
    public function newAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('FrontBonPlanBundle:Evennement')->find($id);

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();

        $reserver = new Reserver();
        $form = $this->createForm('Front\BonPlanBundle\Form\ReserverType', $reserver);
        $form->handleRequest($request);
        $reserver->setIdev($event);
        $reserver->setIduser($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reserver);
            $em->flush();

            //return $this->redirectToRoute('reserver_show', array('idreservation' => $reserver->getIdreservation()));
            return $this->redirectToRoute('front_bon_plan_menu');
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
        $evennement = new Evennement();
        $evennement = $reserver->getIdev();
        $user = new User();
        $user = $reserver ->getIduser();


        return $this->render('reserver/show.html.twig', array(
            'reserver' => $reserver,
            'user' => $user,
            'evenement' => $evennement,
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

    public function activerAction (Request $request)
    {

        $id = $request->get('idreservation');
        $em = $this->getDoctrine()->getManager();
        $reserver = $em->getRepository('FrontBonPlanBundle:Reserver')->find($id);
        $reserver->SetEtat("Active");
        $user = $reserver->getIduser();
        $em->persist($reserver);
        $em->flush();

        $message = \Swift_Message::newInstance()
            ->setSubject('Confirmation de réservation')
            ->setFrom('bonplan2info@gmail.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->renderView(
                    'FrontBonPlanBundle:Default:ConfirmationReservation.html.twig'
                ),
                'text/html'
            );
        $this->get('mailer')->send($message);

        return $this->redirectToRoute('reserver_index');
    }

    public function desactiverAction (Request $request)
    {
        $id = $request->get('idreservation');
        $em = $this->getDoctrine()->getManager();
        $reserver = $em->getRepository('FrontBonPlanBundle:Reserver')->find($id);
        $reserver->SetEtat("Annulé");
        $em->persist($reserver);
        $em->flush();
        return $this->redirectToRoute('reserver_index');
    }


    public function createreservationAction(Request $request,$idevent,$iduser,$nbrePlace)
    {
        //connexion
        $em = $this->getDoctrine()->getManager();
        //get annonce and client object
        $user = $em->getRepository('FrontBonPlanBundle:User')->find($iduser);
        $event = $em->getRepository('FrontBonPlanBundle:Evennement')->find($idevent);
        //instance réserver
        $Reserver= new Reserver();
        //affecter les champs
        $Reserver->setIdev($event);
        $Reserver->setIduser($user);
        $Reserver->setNbrePlaces($nbrePlace);
        $Reserver->setDate(new \DateTime('now'));
        $em->persist($Reserver);
        $em->flush();
        //format date
        $callback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format('Y-m-d')
                : '';
        };
        $normalizer = new ObjectNormalizer();
        //ne pas envoyer client,annonce,commentaires dans le retour json
        $normalizer->setIgnoredAttributes(array('user','evennement','reserver'));
        $normalizer->setCallbacks(array('Date' => $callback));
        $normalizer->setCircularReferenceLimit(1);
        $serializer = new Serializer([$normalizer]);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $formatted= $serializer->normalize($Reserver, 'json');
        return new JsonResponse($formatted);
    }
}
