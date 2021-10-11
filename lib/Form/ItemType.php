<?php

namespace Mazarini\SymfoTabBundle\Form;

use Mazarini\SymfoTabBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
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
            'data_class' => Item::class,
        ]);
    }
}
