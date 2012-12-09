<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('men_nombre')
            ->add('men_precio')
            ->add('men_activo')
            ->add('men_frecuencia')
            ->add('men_fecha_inicio')
            ->add('men_fecha_termino')
            ->add('local')
            ->add('ingredientes','entity',array('class'=>'MenUSACH\Bundle\BaseBundle\Entity\Ingrediente', 'property'=>'ing_nombre'));
        ;
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
