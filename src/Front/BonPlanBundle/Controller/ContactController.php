<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/04/2018
 * Time: 23:48
 */

namespace Front\BonPlanBundle\Controller;
use Front\BonPlanBundle\Entity\Contact;
use Front\BonPlanBundle\Form\ContactType;
use Front\BonPlanBundle\FrontBonPlanBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Swift_Message;


class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
        $mail = new Contact();
        $form= $this->createForm(ContactType::class, $mail);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em= $this->getDoctrine()->getManager();
            $em->persist($mail);
            $em->flush();
            $message = \Swift_Message::newInstance()
                ->setSubject('Accusé de réception')
                ->setFrom('bonplan2info@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'FrontBonPlanBundle:Default:ContactMail.html.twig',
                        array('nom' => $mail->getNom(), 'prenom'=>$mail->getPrenom())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('front_bon_plan_success'));
        }

        return $this->render('FrontBonPlanBundle:Default:contactS.html.twig',
            array('form'=>$form->createView()));

    }

 public function successAction(){
     return $this->render("FrontBonPlanBundle:Default:ContactMail.html.twig");
    }

 public function listcntAction()
 {
     $em= $this->getDoctrine()->getManager();
     $ctn= $em->getRepository("FrontBonPlanBundle:Contact")->findAll();
     return $this->render('contact/listcontact.html.twig', array(
         'ctns' => $ctn,));
 }
    public function deleteAction(Request $request, Contact $idcnt)
    {
        $em=$this->getDoctrine()->getManager();
        $contact=$em->getRepository('FrontBonPlanBundle:Newsletter')->find($idcnt);
        $em->remove($contact);
        $em->flush();
        return $this->redirectToRoute("contact_list");
    }
}