<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/04/2018
 * Time: 17:44
 */

namespace Front\BonPlanBundle\Controller;


use Back\BonPlanBackBundle\BackBonPlanBackBundle;
use Front\BonPlanBundle\Entity\Newsletter;
use Front\BonPlanBundle\Entity\User;
use Front\BonPlanBundle\Form\MailingType;
use Front\BonPlanBundle\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swift_Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class NewsletterController extends Controller
{
public function listMailAction()
{
   $em= $this->getDoctrine()->getManager();
   $mail= $em->getRepository("FrontBonPlanBundle:Newsletter")->findAll();
   $usermail=$em->getRepository("FrontBonPlanBundle:User")->findBy(array('news'=>true));
   return $this->render('Newsletter/index.html.twig', array(
        'emails' => $mail,'usermails'=>$usermail));
}

public function inscriAction(Request $request)
{
    $Newsletter = new Newsletter();
   if($request->getMethod()=="POST")
    {
        $mail=$request->get('email');
        $em = $this->getDoctrine()->getManager()->getRepository('FrontBonPlanBundle:Newsletter')->findBy(array('mailinter'=>$mail));
        if ($em==null)
        {
            $Newsletter->setMailinter($mail);
            $em->persist($Newsletter);
            $em->flush();
            return $this->redirectToRoute('confirmation_inscri_news');
        }
        else
        {
            return $this->render('FrontBonPlanBundle:Default:alertnews.html.twig');
        }
    }
}

public function confirinscriAction()
{
    return $this->render ('FrontBonPlanBundle:Default:inscrinews.html.twig');
}

public function deleteusermailAction(Request $request)
    {

        $id = $request->get('id');

        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository("FrontBonPlanBundle:User")->find($id);
        $user->setNews(false);
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute("mailnews_index");
    }

public function deleteintermailAction($idnewsl)
    {
        $em=$this->getDoctrine()->getManager();
        $mailinter=$em->getRepository('FrontBonPlanBundle:Newsletter')->find($idnewsl);
        $em->remove($mailinter);
        $em->flush();
        return $this->redirectToRoute("mailnews_index");
    }

public  function  preenvoiuniqAction()
{
    return $this->render ('Newsletter/new.html.twig');
}

public  function  envoiuniqinterAction($email='',Request $request)
    {
        if ($request->getMethod()=='POST') {
            $subject = $request->get('subject');
            $mailtext = $request->get('mailtext');
            $email=$request->get('email');
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom('bonplan2info@gmail.com')
                ->setTo($email)
                ->setBody( $mailtext,'text/html'
                );
            $this->get('mailer')->send($message);
            return new Response("mail envoyé avec succés");
        }
        return $this->render ('Newsletter/new.html.twig', array('email' =>$email));
    }

public function envoieallinterAction(Request $request)
{
   // $mail = new Newsletter();
    /*$form = $this->createForm(MailingType::class, $mail);
    $form->handleRequest($request);*/
    $em = $this->getDoctrine()->getManager();
    $tomails = $em->getRepository("FrontBonPlanBundle:Newsletter")->findAll();

   if ($request->getMethod()=='POST') {
       $subject = $request->get('subject');
       $mailtext = $request->get('mailtext');
       $arraymail=array();
       foreach ($tomails as $tomail){
           $arraymail[]=$tomail->getMailinter();
       }
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom('bonplan2info@gmail.com')
            ->setTo(/*array($tomails->getMailinter())*/$arraymail)
            ->setBody( $mailtext,'text/html'
        );
        $this->get('mailer')->send($message);
        echo'Mail send success';
    }

    return $this->render ('Newsletter/edit.html.twig');
}

public function envoiealluserAction(Request $request){

    $em= $this->getDoctrine()->getManager();
    $usermails=$em->getRepository("FrontBonPlanBundle:User")->findBy(array('news'=>true));
    if ($request->getMethod()=='POST')
    {
    $umail=array();
    $subject=$request->get('subject');
    $mailtext=$request->get('mailtext');
    foreach ($usermails as $usermail){
        $umail[]=$usermail->getEmail();
    }

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom('bonplan2info@gmail.com')
            ->setTo($umail)
            ->setBody($mailtext,
                'text/html'
            );
        $this->get('mailer')->send($message);
        return new Response('mail envoyé avec succes');
    }
    return $this->render('Newsletter/show.html.twig');
}

public function envoiuniquserAction(Request $request, $email=''){

    if ($request->getMethod()=='POST'){
        $subject=$request->get('subject');
        $mailtext = $request->get('mailtext');

    $message = \Swift_Message::newInstance()
        ->setSubject($subject)
        ->setFrom('bonplan2info@gmail.com')
        ->setTo($email)
        ->setBody(($mailtext), 'text/html'
        );
    $this->get('mailer')->send($message);
    return new Response ('mail envoyé') ;
    }
    return $this->render ('Newsletter/newu.html.twig',array('email'=>$email));
}

}