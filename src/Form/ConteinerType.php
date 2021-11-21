<?php

namespace App\Form;

use App\Entity\Conteiner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConteinerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number')
            ->add('type')
            ->add('status')
            ->add('category')
            ->add('cliente_conteiner')
            ->add('cont_movimenta')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Conteiner::class,
        ]);
    }
}
