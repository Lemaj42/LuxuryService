<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Experience;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('Gender')
            ->add('FirstName')
            ->add('LastName')
            // ->add('Adress')
            // ->add('Country')
            // ->add('Nationality')
            // ->add('Passport')
            // ->add('PassportFile')
            // ->add('CurriculumVitae')
            // ->add('ProfilPicture')
            // ->add('CurrentLocation')
            // ->add('DateOfBirth', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('PlaceOfBirth')
            // ->add('EmailAdress')
            // ->add('ConfirmEmail')
            // ->add('Password')
            // ->add('ConfirmPassword')
            // ->add('Availability')
            // ->add('JobCategory')
            // ->add('Experience')
            // ->add('ShortDescription')
            // ->add('Notes')
            // ->add('DateCreated', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('DateUpdated', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('DateDeleted', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('Files')
            // ->add('experience', EntityType::class, [
            //     'class' => Experience::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
