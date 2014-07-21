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
class KeyboardControlCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('doh_main.keyboard_control.handler')) {
            return;
        }

        $definition = $container->getDefinition(
            'doh_main.keyboard_control.handler'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'doh_main.keyboard_control.extension'
        );
        foreach ($taggedServices as $id => $tagAttributes) {
            $definition->addMethodCall(
                'registerExtension',
                array(new Reference($id))
            );
        }
    }
}
