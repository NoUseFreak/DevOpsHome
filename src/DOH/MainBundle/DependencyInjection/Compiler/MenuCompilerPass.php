<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DOH\MainBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */ 
class MenuCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('doh_main.menu.handler')) {
            return;
        }

        $definition = $container->getDefinition(
            'doh_main.menu.handler'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'doh_main.menu.provider'
        );
        foreach ($taggedServices as $id => $tagAttributes) {
            $definition->addMethodCall(
                'registerProvider',
                array(new Reference($id))
            );
            $container->getDefinition($id)
                ->addMethodCall('setRouter', array(new Reference('router')));
        }
        $definition->addMethodCall('build');
    }
}
