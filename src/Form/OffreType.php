<?php

namespace App\Form;

use App\Entity\OffresDeTravail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre_offre_de_travail')
            ->add('type_offre_de_travail', ChoiceType::class,[
                'choices' => [
                    'CDD' => 'CDD',
                    'CDI' => 'CDI',
                    'STAGE' => 'STAGE',
                    'Alternance' => 'Alternance',

                ],
                'expanded' => true
            ])
            ->add('salaire_offre_de_travail')
            ->add('specialite_offre_de_travail')
            ->add('description_offre_de_travail')
            ->add('entreprise_offre_de_travail')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OffresDeTravail::class,
        ]);
    }
}
