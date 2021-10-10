<?php

namespace Mazarini\SymfoTabBundle\Form;

use Mazarini\SymfoTabBundle\Entity\Stab;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StabType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tabName')
            ->add('tabKey')
            ->add('tabData')
            ->add('createdAt')
            ->add('updateBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stab::class,
        ]);
    }
}
