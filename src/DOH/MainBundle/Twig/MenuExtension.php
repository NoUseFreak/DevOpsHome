<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace DOH\MainBundle\Twig;

use Symfony\Bundle\FrameworkBundle\Routing\Router;


/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MenuExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    private $url;

    public function __construct(Router $router)
    {
        $this->url = $router->getContext()->getPathInfo();
    }
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('menu_is_active', array($this, 'isActive')),
        );
    }

    public function isActive($link, $loose = false)
    {
        return ($this->url == $link)
            || ($loose && $this->looseActive($link));
    }

    private function looseActive($link)
    {
        preg_match('/^\/([^\/]+)/', $link, $linkMatches)
            && preg_match('/^\/([^\/]+)/', $this->url, $urlMatches);

        if (isset($urlMatches) && isset($urlMatches[1])) {
            return $urlMatches[1] == $linkMatches[1];
        }

        return false;
    }

    public function getName()
    {
        return 'doh_main_menu';
    }
} 
