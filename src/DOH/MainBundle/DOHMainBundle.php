<?php

namespace DOH\MainBundle;

use DOH\MainBundle\DependencyInjection\Compiler\KeyboardControlCompilerPass;
use DOH\MainBundle\DependencyInjection\Compiler\MenuCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DOHMainBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new KeyboardControlCompilerPass());
        $container->addCompilerPass(new MenuCompilerPass());
    }
}
