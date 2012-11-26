<?php

namespace MenUSACH\Bundle\BaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('men_nombre', 'text' , array(
            'label' => 'Nombre',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            ),
            'required' => true
            ));
        $builder->add('men_precio', 'number', array(
            'label' => 'Precio',
            'attr' => array(
                'prepend_input' => '$',
                'class' => 'span2',
                'placeholder' => 'Precio'
            ),
            'required' => true
        ));
        $builder->add('men_frecuencia', 'choice', array(
            'label' => 'Frecuencia',
            'choices' => array('0' => 'Permanente', '1' => 'Día fijo',
                '2' => 'Intervalo'),
            'attr' => array(
                'class' => 'span3'
            ),
            'required' => true
        ));
        $builder->add('men_fecha_inicio', 'date', array(
            'widget' => 'single_text',
            'format' => 'MM/dd/yyyy',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            ),
            'required' => false
        ));
        $builder->add('men_fecha_termino', 'date', array(
            'label' => 'Fecha término',
            'widget' => 'single_text',
            'format' => 'MM/dd/yyyy',
            'attr' => array(
                'class' => 'span3'
            ),
            'required' => false
        ));
    }
    
    public function getName()
    {
        return 'menu_form';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Menu'
        ));
    }
}
