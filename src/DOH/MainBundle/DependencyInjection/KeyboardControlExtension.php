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

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */ 
class KeyboardControlExtension implements KeyboardControlExtensionInterface
{
    public function build(array &$list)
    {
        $list[] = new LocationControl(
            array('d'),
            '/',
            'Go to dashboard'
        );
        $list[] = new CallbackControl(
            array('?'),
            '$("#doh-keyboard-help").modal("show")',
            'Bring up this help dialog'
        );
    }
}
