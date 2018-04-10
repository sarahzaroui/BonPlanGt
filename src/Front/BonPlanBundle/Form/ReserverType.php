<?php

namespace Front\BonPlanBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReserverType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Evennement',EntityType::class,array(
                'class'=>'FrontBonPlanBundle:Evennement',
                'choice_label'=>'nom',
                'multiple'=>false))
            ->add('idreservation',HiddenType::class)
            ->add('date')
            ->add('iduser',HiddenType::class)
            ->add('idev',HiddenType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\BonPlanBundle\Entity\Reserver'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_bonplanbundle_reserver';
    }


}