<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MenuType extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('men_nombre');
        $builder->add('men_precio', 'number');
    }
    
    public function getName()
    {
        return 'menu_form';
    }
    
    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Menu'
        );
    }
}