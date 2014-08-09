<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DOH\MainBundle\Menu\Model;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class MenuItem
{
    private $title;
    private $link;
    private $properties;

    private $menuItems;

    public function __construct($title, $link = null, $properties = array())
    {
        $this->title = $title;
        $this->link  = $link;
        $this->properties = $properties;

        $this->menuItems = array();
    }

    public function addItem(MenuItem $item)
    {
        $this->menuItems[] = $item;
    }

    /**
     * @return MenuItem[]
     */
    public function getChildren()
    {
        return $this->menuItems;
    }

    /**
     * @return string|null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setProperty($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function getProperties()
    {
        return $this->properties;
    }
} 
