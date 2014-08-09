<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DOH\MainBundle\Menu;

use DOH\MainBundle\Menu\Model\MenuItem;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */ 
class MenuHandler
{
    /**
     * @var MenuProviderInterface[]
     */
    private $providers = array();
    private $menus = array();

    public function setMenu($name, MenuItem $menuItem)
    {
        $this->menus[$name] = $menuItem;
    }

    public function getMenu($name, $create = false)
    {
        if (isset($this->menus[$name])) {
            return $this->menus[$name];
        }

        if ($create) {
            return $this->menus[$name] = new MenuItem($name);
        }

        return null;
    }

    public function registerProvider(MenuProviderInterface $provider)
    {
        $this->providers[] = $provider;
    }

    public function build()
    {
        if (count($this->menus)) {
            return true;
        }

        foreach ($this->providers as $provider) {
            $provider->alterMenu($this);
        }
    }
}
