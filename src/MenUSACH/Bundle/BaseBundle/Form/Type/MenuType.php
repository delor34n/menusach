<?php

namespace MenUSACH\Bundle\BaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('men_nombre', 'text');
        $builder->add('men_precio', 'number');
        $builder->add('men_frecuencia', 'choice', array(
            'choices' => array('0' => 'Permanente', '1' => 'Día fijo',
                '2' => 'Intervalo'),
            'required' => true
        ));
        $builder->add('men_fecha_inicio', 'date', array(
            'widget' => 'single_text',
            'format' => 'dd-MM-yyyy'
        ));
        $builder->add('men_fecha_termino', 'date', array(
            'widget' => 'single_text',
            'format' => 'dd-MM-yyyy'
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
