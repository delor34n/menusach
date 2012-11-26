<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IngredienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ing_nombre')
            ->add('ing_categoria')
            ->add('menus')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Ingrediente'
        ));
    }

    public function getName()
    {
        return 'menusach_bundle_basebundle_ingredientetype';
    }
}
