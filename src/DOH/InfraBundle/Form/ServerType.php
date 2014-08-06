<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DOH\InfraBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class ServerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('farms')
            ->add('roles')
            ->add('specSheet', 'doh_infra_server_spec_sheet')
            ->add('nics', 'collection', array(
                'type' => 'doh_infra_server_nic',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'options'  => array(
                    'required'  => false,
                ),
            ))
        ;
    }

    public function getName()
    {
        return 'doh_infra_server';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DOH\InfraBundle\Entity\Server',
            'cascade_validation' => true,
        ));
    }
}
