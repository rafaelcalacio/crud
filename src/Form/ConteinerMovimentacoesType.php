<?php

namespace App\Form;

use App\Entity\ConteinerMovimentacoes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConteinerMovimentacoesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('movement_type')
            ->add('dt_inicio')
            ->add('dt_fim')
            ->add('container_number')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ConteinerMovimentacoes::class,
        ]);
    }
}
