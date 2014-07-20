<?php

namespace DOH\MainBundle;

use DOH\MainBundle\DependencyInjection\Compiler\KeyboardControlCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DOHMainBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new KeyboardControlCompilerPass());
    }
}
