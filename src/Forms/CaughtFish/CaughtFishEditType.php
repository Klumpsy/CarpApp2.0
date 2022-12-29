<?php

namespace App\Forms\CaughtFish;

use App\Entity\CaughtFish;
use App\Entity\Water;
use App\Repository\WaterRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CaughtFishEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('water', EntityType::class, [
                'class' => Water::class,
                'label' => 'Water',
                'query_builder' => function(WaterRepository $waterRepository) {
                    return $waterRepository->createQueryBuilder('water')
                        ->orderBy('water.name', 'ASC');
                }
            ])
            ->add('weight', TextType::class, [
                'label' => 'Gewicht'
            ])
            ->add('image', FileType::class, [
                'label' => 'Foto',
                'data_class' => null
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
            'data_class' => CaughtFish::class,
        ]);
    }
}