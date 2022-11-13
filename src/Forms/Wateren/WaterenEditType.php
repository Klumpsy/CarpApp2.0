<?php

namespace App\Forms\Wateren;

use App\Entity\Water;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WaterenEditType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Naam'
            ])
            ->add('country', TextType::class, [
                'label' => 'Land'
            ])
            ->add('type', TextType::class, [
                'label' => 'Type'
            ])
            ->add('boat', CheckboxType::class, [
                'label' => 'Boot',
                'required' => false,
            ])
            ->add('baitBoat', CheckboxType::class, [
                'label' => 'Voerboot',
                'required' => false,
            ])
            ->add('nightFishing', CheckboxType::class, [
                'label' => 'Nachtvissen',
                'required' => false,
            ])
            ->add('accessibility', RangeType::class, [
                'label' => 'Bereikbaarheid:',
                'attr' => [
                    'min' => 0,
                    'max' => 100
                ]
            ])
            ->add('size', NumberType::class, [
                'label' => 'Oppervlakte in hectare'
            ])
            ->add('hardWater', CheckboxType::class, [
                'label' => 'Moeilijk water',
                'required' => false,
            ])
            ->add('crayfish', CheckboxType::class, [
                'label' => 'Kreeften',
                'required' => false,
            ])
            ->add('smallFish', CheckboxType::class, [
                'label' => 'Veel kleine vis',
                'required' => false,
            ])
            ->add('bigFish', CheckboxType::class, [
                'label' => 'Grote vis',
                'required' => false,
            ])
            ->add('notes', TextareaType::class, [
                'label' => 'Aantekeningen',
                'attr' => [
                    'rows' => 7
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Foto'
            ])

            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success btn-lg'
                ],
                'label' => 'Opslaan'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Water::class,
        ]);
    }
}