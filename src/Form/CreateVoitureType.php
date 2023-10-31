<?php

namespace App\Form;

use App\Entity\VoituresType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CreateVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $textButton = 'Créer';

        // if ($this->getRouteName() === 'voitureType_edit') {
        //     $textButton = 'Modifier';
        // }

        if ($options['is_edit']) {
            $textButton = 'Modifier';
        }

        $builder
            ->add('nom')
            ->add('minKg')
            ->add('maxKg')
            ->add('noteEco')
            ->add($textButton, SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VoituresType::class,
            'is_edit' => false,
        ]);
    }
}
