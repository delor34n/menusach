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
            'label' => 'Nombre',
            'attr' => array(
                'class' => 'span3',
                'placeholder' => 'Nombre'
            )));
        $builder->add('men_precio');
        $builder->add('men_frecuencia');
        $builder->add('men_fecha_inicio');
        $builder->add('men_fecha_termino');
        $builder->add('local', 'entity',
                    array('class'=>'MenUSACH\Bundle\BaseBundle\Entity\Local',
                        'property'=>'loc_nombre'));
        $builder->add('ingredientes','entity',
                    array('class'=>'MenUSACH\Bundle\BaseBundle\Entity\Ingrediente',
                        'property'=>'ing_nombre'));
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
