<?php
/**
 * This file is part of the DevOpsHome package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DOH\MainBundle\KeyboardControl;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */ 
class LocationControl
{
    private $shortcut;
    private $location;
    private $description;

    public function __construct(array $shortcut, $location, $description = null)
    {
        $this->shortcut = $shortcut;
        $this->location = $location;
        $this->description = $description;
    }

    public function render()
    {
        return sprintf(
            "Mousetrap.bind('%s', function() { window.location = '%s'; });",
            implode(' ', $this->getShortcut()),
            $this->location
        );
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getShortcut()
    {
        $shortcut = $this->shortcut;

        array_unshift($shortcut, 'g');

        return $shortcut;
    }
}
