<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Nombre', 'text' , array(
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            )));
        $builder->add('Email', 'email' , array(
            'label' => 'Correo electrónico',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Correo electrónico'
            )));
        $builder->add('Asunto', 'text' , array(
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Asunto'
            )));
        $builder->add('Comentario', 'textarea' , array(
            'label' => 'Mensaje',
            'attr' => array(
                'rows' => '6',
                'class' => 'span3',
                'placeholder' => 'Ingrese su mensaje aquí...'
            )));
    }

    public function getName()
    {
        return 'contact';
    }
}
