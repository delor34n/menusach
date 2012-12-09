<?php

namespace MenUSACH\Bundle\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('per_nombre')
            ->add('per_apellido_paterno')
            ->add('per_apellido_materno')
            ->add('username')
            ->add('password')
            //->add('salt')
            ->add('per_email')
            ->add('isActive')
            ->add('persona_roles')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MenUSACH\Bundle\BaseBundle\Entity\Persona'
        ));
    }

    public function getName()
    {
        return 'menusach_bundle_basebundle_personatype';
    }
}
