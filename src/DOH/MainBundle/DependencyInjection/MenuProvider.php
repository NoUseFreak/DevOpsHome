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

use DOH\MainBundle\Menu\AbstractMenuProvider;
use DOH\MainBundle\Menu\MenuHandler;
use DOH\MainBundle\Menu\Model\MenuItem;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MenuProvider extends AbstractMenuProvider
{
    public function alterMenu(MenuHandler $handler)
    {
        $menu = $handler->getMenu('sidebar', true);

        $menu->addItem(
            new MenuItem('Dashboard',
            $this->getRouter()->generate('doh_main_dashboard'),
            array('icon_class' => 'fa fa-dashboard')
        ));
    }
}
