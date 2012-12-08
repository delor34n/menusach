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
        $builder->add('Nombre');
        $builder->add('Email', 'email');
        $builder->add('Asunto');
        $builder->add('Comentario', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}
