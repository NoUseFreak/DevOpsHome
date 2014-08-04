<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DOH\InfraBundle\Form\Type;

use DOH\GuideBundle\Entity\GuideRepository;
use DOH\InfraBundle\Entity\ServerChangelog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class ChangelogType extends AbstractType
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var GuideRepository
     */
    protected $guideRepository;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @param \DOH\GuideBundle\Entity\GuideRepository $guideRepository
     */
    public function setGuideRepository($guideRepository)
    {
        $this->guideRepository = $guideRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('guide', 'entity', array(
                'class' => 'DOHGuideBundle:Guide',
                'property' => 'name',
                'required'  => false,
            ))
            ->add('guideParameters', 'collection', array(
                    'type' => 'doh_guide_parameter_data',
                    'options'  => array(
                        'required'  => false,
                    ),
                ))
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'doh_infra_server_changelog';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DOH\InfraBundle\Entity\ServerChangelog',
            'cascade_validation' => true,
        ));
    }
}
