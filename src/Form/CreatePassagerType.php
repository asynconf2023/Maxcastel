<?php

namespace App\Form;

use App\Entity\Passagers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CreatePassagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbDePassagers')
            ->add('bonusOuMalus', ChoiceType::class, [
                'choices' => [
                    'Bonus' => 'bonus',
                    'Malus' => 'malus',
                ],
            ])
            ->add('bonusOuMalusPourcentage')
            ->add('Creer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Passagers::class,
        ]);
    }
}
