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

use Symfony\Bundle\FrameworkBundle\Routing\Router;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */ 
abstract class AbstractMenuProvider implements MenuProviderInterface
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @param Router $router
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @return Router
     */
    protected function getRouter()
    {
        return $this->router;
    }
}
