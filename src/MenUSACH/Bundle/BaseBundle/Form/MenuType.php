<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('men_nombre', 'text' , array(
            'label' => 'Nombre:',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            )));
        $builder->add('men_precio', 'number', array(
            'label' => 'Precio:',
            'attr' => array(
                'prepend_input' => '$',
                'class' => 'span2',
                'placeholder' => 'Precio',
            )));
        $builder->add('men_frecuencia', 'choice', array(
            'label' => 'Frecuencia:',
            'choices' => array('0' => 'Permanente', '1' => 'Día fijo'),
            'attr' => array(
                'class' => 'span3'
            )));
        $builder->add('men_fecha', 'date', array(
            'widget' => 'single_text',
            'label' => 'Fecha:',
            //'widget' => 'single_text',
            'format' => 'MM/dd/yyyy',
            'attr' => array(
                'class' => 'span3'
                ),
            'required' => false
            ));
        $builder->add('local', 'entity', array(
            'label' => 'Local:',
            'class'=>'MenUSACH\Bundle\BaseBundle\Entity\Local',
            'property'=>'loc_nombre'
            ));
        $builder->add('ingredientes','entity', array(
            'label' => 'Ingredientes:',
            'class'=>'MenUSACH\Bundle\BaseBundle\Entity\Ingrediente',
            'property'=>'ing_nombre',
            'expanded' => true,
            'multiple' => true
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Menu'
        ));
    }

    public function getName()
    {
        return 'menusach_bundle_basebundle_menutype';
    }
}
