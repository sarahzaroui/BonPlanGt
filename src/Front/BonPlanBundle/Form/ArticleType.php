<?php

namespace Front\BonPlanBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class,array(
            'attr' => array('class' => 'form-control','required'   => true),
))
            ->add('description',TextareaType::class ,array(
                'attr' => array('class' => 'form-control','required'   => true),
            ))
            ->add('adresse',TextType::class ,array(
                'attr' => array('class' => 'form-control','required'   => true),
            ))
            ->add('imageFile', VichFileType::class, array(
                'required'      => true,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => true, // not mandatory, default is true
            ))

            ->add('idcatart' )
            ->add('idregion')
            ->add('iduser',HiddenType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Front\BonPlanBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'front_bonplanbundle_article';
    }


}
