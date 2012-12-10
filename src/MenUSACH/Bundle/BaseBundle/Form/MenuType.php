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
            ->add('men_frecuencia')
            ->add('men_fecha')
            ->add('local', 'entity', array('class'=>'MenUSACH\Bundle\BaseBundle\Entity\Local', 'property'=>'loc_nombre'))
            ->add('ingredientes','entity',array('class'=>'MenUSACH\Bundle\BaseBundle\Entity\Ingrediente', 'property'=>'ing_nombre', 'expanded' => true, 'multiple' => true));
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
