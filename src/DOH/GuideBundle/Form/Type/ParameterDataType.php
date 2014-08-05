<?php

namespace DOH\GuideBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ParameterDataType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'disabled' => true,
            ))
            ->add('data')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'doh_guide_parameter_data';
    }
}
