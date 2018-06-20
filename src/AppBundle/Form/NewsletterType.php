<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2018
 * Time: 22:55
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsletterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    { $builder
        ->add('dest', TextType::class)
        ->add('subject', TextType::class)
        ->add('mailtext', TextType::class)
        ->add('envoyer', SubmitType::class) ;
    }
}