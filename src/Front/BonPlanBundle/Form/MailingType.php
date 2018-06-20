<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17/04/2018
 * Time: 21:29
 */

namespace Front\BonPlanBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MailingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { $builder

        ->add('subject', TextType::class)
        ->add('mailtext', TextareaType::class)
        ->add('envoyer', SubmitType::class) ;
    }
    public function getName()
    {
        return 'Mail';
    }
}