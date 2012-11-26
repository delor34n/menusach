<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropietarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('per_nombre', 'text', array(
                    'label' => 'Nombre',
                    'attr' => array(
                            'class' => 'span3',
                            'placeholder' => 'Nombre'
                    ),
                    'required' => true
            ))
            ->add('per_apellido_paterno', 'text', array(
				'label' => 'Apellido Paterno',
				'attr' => array(
					'class' => 'span3',
					'placeholder' => 'Apellido Paterno'
				),
				'required' => true
			))
            ->add('per_apellido_materno', 'text', array(
				'label' => 'Apellido Materno',
				'attr' => array(
					'class' => 'span3',
					'placeholder' => 'Apellido Materno'
				),
				'required' => true
			))
            ->add('per_usuario', 'text', array(
				'label' => 'Usuario',
				'attr' => array(
					'class' => 'span3',
					'placeholder' => 'Usuario'
				),
				'required' => true
			))
            ->add('per_password', 'text', array(
				'label' => 'Password',
				'attr' => array(
					'class' => 'span3',
					'placeholder' => 'Password'
				),
				'required' => true
			))
            ->add('per_email', 'text', array(
				'label' => 'Email',
				'attr' => array(
					'class' => 'span3',
					'placeholder' => 'Email'
				),
				'required' => true
			))
            ->add('pro_fono', 'integer', array(
				'label' => 'Telefono',
				'attr' => array(
					'class' => 'span3',
					'placeholder' => 'Telefono'
				),
				'required' => true
			))
        ;
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
