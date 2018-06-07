<?php

namespace Front\BonPlanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class PubliciteArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('imageFile',VichFileType::class, array(
                'required'      => true,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => true, // not mandatory, default is true
            ))

            ->add('publicite',EntityType::class,array (
                'class'=>'FrontBonPlanBundle:Publicite',
                'choice_label'=>'libelle' ,
                'multiple'=>false
            ) );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\BonPlanBundle\Entity\PubliciteArticle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_bonplanbundle_publicitearticle';
    }


}
