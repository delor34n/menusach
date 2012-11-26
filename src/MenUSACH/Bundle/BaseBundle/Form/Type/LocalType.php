<?php

namespace MenUSACH\Bundle\BaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('loc_nombre', 'text' , array(
            'label' => 'Nombre:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            ),
            'required' => true
            ));
        $builder->add('loc_ubicacion', 'text' , array(
            'label' => 'Ubicación:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Ubicación'
            ),
            'required' => true
            ));
    }

    public function getName()
    {
        return 'local_form';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Local'
        ));
    }
}
