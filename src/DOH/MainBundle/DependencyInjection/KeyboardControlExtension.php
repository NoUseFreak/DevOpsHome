<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DOH\MainBundle\DependencyInjection;

use DOH\MainBundle\KeyboardControl\CallbackControl;
use DOH\MainBundle\KeyboardControl\LocationControl;
use DOH\MainBundle\KeyboardControl\KeyboardControlExtensionInterface;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */ 
class KeyboardControlExtension implements KeyboardControlExtensionInterface
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function build(array &$list)
    {
        $list[] = new LocationControl(
            array('d'),
            $this->router->generate('doh_main_dashboard'),
            'Go to dashboard'
        );
        $list[] = new CallbackControl(
            array('?'),
            '$("#doh-keyboard-help").modal("show")',
            'Bring up this help dialog'
        );
    }
}
