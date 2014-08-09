<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace DOH\MainBundle\Form;

use FOS\UserBundle\Form\Type\ProfileFormType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class UserProfileType extends ProfileFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->get('username')->setDisabled(true);

        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('bio', null, array('required' => false,))
            ->add('skype')
            ->add('twitter')
            ->add('github')
            ->add('homepage', 'url', array('required' => false))
            ->add('location')
            ->remove('current_password')
        ;
    }

    public function getName()
    {
        return 'doh_user_profile';
    }
} 
