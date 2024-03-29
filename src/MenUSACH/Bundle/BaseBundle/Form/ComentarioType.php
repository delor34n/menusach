<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComentarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('com_nombre', 'text', array(
                'label' => 'Nombre',
                'attr' => array(
                    'class' => 'span3'
                )
            ))
            ->add('com_descripcion', 'textarea', array(
                'label' => 'Comentario',
                'attr' => array(
                    'class' => 'span3'
                )
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Comentario'
        ));
    }

    public function getName()
    {
        return 'menusach_bundle_basebundle_comentariotype';
    }
}
