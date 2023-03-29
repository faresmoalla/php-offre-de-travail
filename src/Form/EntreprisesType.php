<?php

namespace App\Form;

use App\Entity\Entreprises;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntreprisesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_representant')
            ->add('adresse')
            ->add('tel_entreprise')
            ->add('description_entreprise')
            ->add('image',FileType::class, array('data_class' => null))

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprises::class,
        ]);
    }
}
