<?php

namespace Scourgen\PersonFinderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entryDate', DateTimeType::class)
            ->add('authorName')
            ->add('authorEmail')
            ->add('authorPhone')
            ->add('sourceDate', DateTimeType::class)
            ->add('author_made_contact')
            ->add('status')
            ->add('email_of_found_person')
            ->add('phone_of_found_person')
            ->add('last_know_location')
            ->add('text')
            ->add('photo_url')
//            ->add('person')
//            ->add('linked_person')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Scourgen\PersonFinderBundle\Entity\Note'
        ));
    }
}
