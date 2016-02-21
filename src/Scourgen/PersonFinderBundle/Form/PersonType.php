<?php

namespace Scourgen\PersonFinderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entryDate', DateTimeType::class)
            ->add('expiryDate', DateTimeType::class)
            ->add('authorName')
            ->add('authorEmail')
            ->add('authorPhone')
            ->add('sourceName')
            ->add('sourceDate', DateTimeType::class)
            ->add('sourceUrl')
            ->add('fullName')
            ->add('givenName')
            ->add('familyName')
            ->add('alternateNames')
            ->add('description')
            ->add('sex')
            ->add('dateOfBirth', DateType::class)
            ->add('age')
            ->add('homeStreet')
            ->add('homeNeighborhood')
            ->add('homeCity')
            ->add('homeState')
            ->add('homePostalCode')
            ->add('homeCountry')
            ->add('photoUrl')
            ->add('profileUrls')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Scourgen\PersonFinderBundle\Entity\Person'
        ));
    }
}
