<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Experience;
use App\Entity\Gender;
use App\Entity\JobToCandidate;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('passport', CheckboxType::class, [
                'label' => 'passport'
            ])
            ->add('passportFile', FileType::class, [
                'label' => 'passportFile'
            ])
            ->add('curriculumVitae')
            ->add('profilePicture')
            ->add('currentLocation')
            ->add('dateBrith', null, [
                'widget' => 'single_text',
            ])
            ->add('placeBrith')
            ->add('mail')
            ->add('confirmMail')
            ->add('password', )
            ->add('confirmPassword')
            ->add('availability')
            ->add('jobCategory')
            ->add('shortDescription')
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'choice_label' => 'experience',
            ])

            ->add('sexe', EntityType::class, [
                'class' => Gender::class,
                'choice_label' => 'sexe',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
