<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loc_nombre', 'text', array(
                'label' => 'Nombre de local',
                'attr' => array(
                    'class' => 'span3',
                    'placeholder' => 'Nombre'
            )))
            ->add('loc_ubicacion', 'text', array(
                'label' => 'Ubicación del local',
                'attr' => array(
                    'class' => 'span3',
                    'placeholder' => 'Ubicación'
            )))
            ->add('propietario',
                  'entity', array(
                      'class' => 'MenUSACH\Bundle\BaseBundle\Entity\Propietario',
                      'property' => 'nombreCompleto',
                      'attr' => array(
                          'class' => 'span3'
            )))
            ->add('tiposdepago',
                  'entity', array(
                      'class' => 'MenUSACH\Bundle\BaseBundle\Entity\TipoPago',
                      'property' => 'tp_descripcion',
                      'expanded' => true ,
                      'multiple' => true
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Local'
        ));
    }

    public function getName()
    {
        return 'menusach_bundle_basebundle_localtype';
    }
}
