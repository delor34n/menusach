<?php

namespace MenUSACH\Bundle\BaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropietarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('per_nombre', 'text' , array(
            'label' => 'Nombre:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            ),
            'required' => true
            ));
        $builder->add('per_apellido_paterno', 'text' , array(
            'label' => 'Apellido paterno:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Apellido paterno'
            ),
            'required' => true
            ));
        $builder->add('per_apellido_materno', 'text' , array(
            'label' => 'Apellido materno:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Apellido materno'
            ),
            'required' => true
            ));
        $builder->add('per_usuario', 'text' , array(
            'label' => 'Username:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Username'
            ),
            'required' => true
            ));
        $builder->add('per_password', 'password' , array(
            'label' => 'Contraseña:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Contraseña'
            ),
            'required' => true
            ));
        $builder->add('per_email', 'text' , array(
            'label' => 'E-mail:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'E-mail'
            ),
            'required' => true
            ));
        $builder->add('pro_fono', 'text' , array(
            'label' => 'Fono de contacto:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Fono de contacto'
            ),
            'required' => true
            ));
    }
    
    public function getName()
    {
        return 'propietario_form';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Propietario'
        ));
    }
}
