<?php

namespace Front\BonPlanBundle\Controller;
use Back\BonPlanBackBundle\BackBonPlanBackBundle;
use Swift_Message;
use Front\BonPlanBundle\Entity\Commande;
use Front\BonPlanBundle\Entity\Produit;
use Front\BonPlanBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commande controller.
 *
 */
class CommandeController extends Controller
{
    /**
     * Lists all commande entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('FrontBonPlanBundle:Commande')->findAll();

        return $this->render('commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Creates a new commande entity.
     *
     */
    public function newAction(Request $request, $idproduit)
    {
        $em=$this->getDoctrine()->getManager();
        $produit_db=$em->getRepository('FrontBonPlanBundle:Produit')->find($idproduit);
        $qtecommande = $request->query->get('qtecommande');




        if($request->getMethod()=='POST'){
            //Creation Commande
            $qtecommande = intval($request->request->get('qtecommande'));
            $productid = $request->request->get('productid');
            $commande = new Commande();
            $commande->setIdprod($produit_db);
            $commande->setQtecmd($qtecommande);
            $commande->setDatecmd(new \DateTime("now"));
            $commande->setIduser($produit_db->getIdprestataire());
            $em->persist($commande);
            $em=$this->getDoctrine()->getManager();
            $produit_db=$em->getRepository('FrontBonPlanBundle:Produit')->find($idproduit);
            //$em->flush();
            // MAJ Qte Produit
            $produit_db->setQtedispo($produit_db->getQtedispo() - $qtecommande);
            //$em->persist($produit_db);
            $em->flush();

            return $this->redirect($produit_db->getLien());




            /*$subject = 'Commande';
            $mailtext = 'Article ';
            $email= 'tejsamehdev@gmail.com';//$user->getEmail().'' ;
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom('bonplan2info@gmail.com')
                ->setTo('tejsamehdev@gmail.com')
                ->setBody( $mailtext,'text/html'
                );
            $status = $this->get('mailer')->send($message,$error);
            var_dump($error);
            echo '<p>OK</p>';die;*/
        }
        return $this->render('commande/newfront.html.twig', array(
            'produit'=>$produit_db,
            'qtecommande' => $qtecommande,
            'prix_total' => $qtecommande * $produit_db->getPrix()
        ));
    }

    public function newadminAction(Request $request)
    {
        $commande = new Commande();
        $form = $this->createForm('Front\BonPlanBundle\Form\CommandeType', $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            return $this->redirectToRoute('commande_show', array('idcmd' => $commande->getIdcmd()));
        }

        return $this->render('commande/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a commande entity.
     *
     */
    public function showAction(Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);

        return $this->render('commande/show.html.twig', array(
            'commande' => $commande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commande entity.
     *
     */
    public function editAction(Request $request, Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);
        $editForm = $this->createForm('Front\BonPlanBundle\Form\CommandeType', $commande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commande_edit', array('idcmd' => $commande->getIdcmd()));
        }

        return $this->render('commande/edit.html.twig', array(
            'commande' => $commande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commande entity.
     *
     */
    public function deleteAction(Request $request, Commande $commande)
    {
       $form = $this->createDeleteForm($commande);
        $form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commande);
        //}

        $em->flush();
        return $this->redirectToRoute('commande_index');
    }

    /**
     * Creates a form to delete a commande entity.
     *
     * @param Commande $commande The commande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commande $commande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('idcmd' => $commande->getIdcmd())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
