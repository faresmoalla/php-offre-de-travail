<?php

namespace App\Form;

use App\Entity\Cvs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bio_cv')
            ->add('diplome')
            ->add('annee_diplome')
            ->add('institut')
            ->add('specialite')
            ->add('image',FileType::class, array('data_class' => null))
            ->add('id_freelancer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cvs::class,
        ]);
    }
}
