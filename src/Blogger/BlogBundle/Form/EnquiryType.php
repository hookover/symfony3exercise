<?php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,array(
                'label'=>'姓名'
            ))
            ->add('email',EmailType::class,array(
                'label'=>'电子邮件'
            ))
            ->add('subject',TextType::class,array(
                'label'=>'标题'
            ))
            ->add('body',TextareaType::class,array(
                'label'=>'内容'
            ))
        ;
    }



}
