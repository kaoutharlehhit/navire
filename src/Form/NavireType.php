<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NavireType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('imo', TextType::class)
        ->add('nom', TextType::class)
        ->add('mmsi', TextType::class)
        ->add('indicatifAppel', TextType::class)
        ->add('eta', DateTimeType::class, ['widget' => 'single_text'])
        ->add('longueur', IntegerType::class)
        ->add('largeur', IntegerType::class)
        ->add('imo', IntegerType::class)
        ->add('tirantdeau', NumberType::class, array('scale' => 1, ))
        ->add('aisshiptype', EntityType::class, [
        'class' => AishShipType::class,
        'choice_label' => 'libelle'
        ])
        ->add('pavillon', EntityType::class, [
        'class' => Pays::class,
        'choice_label' => 'nom'
        ])
        ->add('destination', EntityType::class, [
        'class' => Port::class,
        'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
                // Configure your form options here
        ]);
    }
}
