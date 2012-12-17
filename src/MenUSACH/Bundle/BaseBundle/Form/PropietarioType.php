<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropietarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('per_nombre', 'text' , array(
            'label' => 'Nombre',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            )));
        $builder->add('per_apellido_paterno', 'text' , array(
            'label' => 'Apellido paterno',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Apellido paterno'
            )));
        $builder->add('per_apellido_materno', 'text' , array(
            'label' => 'Apellido materno',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Apellido materno'
            )));
        $builder->add('username', 'text' , array(
            'label' => 'Nombre de usuario',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre de usuario'
            )));
        $builder->add('password', 'password', array(
            'label' => 'Contraseña',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Contraseña'
            )));
        $builder->add('per_email', 'email', array(
            'label' => 'Correo electrónico',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Correo electrónico'
            )));
        $builder->add('pro_fono', 'number', array(
            'label' => 'Número de teléfono',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Número de teléfono'
            )));
	$builder->add('propietario_roles', NULL, array(
            'label' => 'Roles',
            'multiple'  => true,
            'attr' => array(
                'class' => 'span3'
            )));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Propietario'
        ));
    }

    public function getName()
    {
        return 'menusach_bundle_basebundle_propietariotype';
    }
}
