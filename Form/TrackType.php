<?php

namespace App\Form;

use App\Entity\Track;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('text')
            ->add('draft')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('name')
            ->add('date')
            ->add('public')
            ->add('time')
            ->add('coast')
            ->add('requiredLevel')
            ->add('objectifs')
            ->add('preRequired')
            ->add('admin')
            ->add('department')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Track::class,
        ]);
    }
}
