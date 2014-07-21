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
class CallbackControl
{
    private $shortcut;
    private $callback;
    private $description;

    public function __construct(array $shortcut, $callback, $description = null)
    {
        $this->shortcut = $shortcut;
        $this->callback = $callback;
        $this->description = $description;
    }

    public function render()
    {
        return sprintf(
            "Mousetrap.bind('%s', function() { %s });",
            implode(' ', $this->getShortcut()),
            $this->callback
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
        return $this->shortcut;
    }
}
