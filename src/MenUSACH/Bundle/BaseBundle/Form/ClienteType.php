<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('per_nombre')
            ->add('per_apellido_paterno')
            ->add('per_apellido_materno')
            ->add('per_usuario')
            ->add('per_password')
            ->add('per_email')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Cliente'
        ));
    }

    public function getName()
    {
        return 'menusach_bundle_basebundle_clientetype';
    }
}
