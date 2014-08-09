<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DOH\InfraBundle\DependencyInjection;

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

        $infraMenu = new MenuItem(
            'Infrastructure',
            $this->getRouter()->generate('doh_infra_server_list'),
            array('icon_class' => 'fa fa-sitemap')
        );

        $infraMenu->addItem(new MenuItem(
            'Servers',
            $this->getRouter()->generate('doh_infra_server_list'),
            array('icon_class' => 'fa fa-hdd-o')
        ));
        $infraMenu->addItem(new MenuItem(
            'Farms',
            $this->getRouter()->generate('doh_infra_farm_list'),
            array('icon_class' => 'fa fa-cloud')
        ));
        $infraMenu->addItem(new MenuItem(
            'Roles',
            $this->getRouter()->generate('doh_infra_role_list'),
            array('icon_class' => 'fa fa-paperclip')
        ));

        $menu->addItem($infraMenu);
    }
}
