<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Job;
use App\Entity\JobCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference')
            ->add('description')
            ->add('active')
            ->add('notes')
            ->add('location')
            ->add('closingDate', null, [
                'widget' => 'single_text',
            ])
            ->add('salary')
            ->add('dateCreation', null, [
                'widget' => 'single_text',
            ])
            ->add('StartingDate', null, [
                'widget' => 'single_text',
            ])
            ->add('jobType', EntityType::class, [
                'class' => self::class,
                'choice_label' => 'id',
            ])
            ->add('jobCategory', EntityType::class, [
                'class' => JobCategory::class,
                'choice_label' => 'id',
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
