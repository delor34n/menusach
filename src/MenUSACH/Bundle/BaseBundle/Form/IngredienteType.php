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
            ->add('ing_nombre', 'text', array(
                'label' => 'Nombre de ingrediente',
                'attr' => array(
                    'class' => 'span3',
                    'placeholder' => 'Nombre'
            )))
            ->add('categorias',
                  'entity', array(
                      'class' => 'MenUSACH\Bundle\BaseBundle\Entity\Categoria',
                      'property' => 'cat_des',
                      'label' => 'Categoría',
                      'attr' => array(
                          'class' => 'span3'
            )));
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
