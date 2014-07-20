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
class KeyboardControlHandler
{
    /**
     * @var KeyboardControlExtensionInterface[]
     */
    private $extensions = array();

    public function registerExtension(KeyboardControlExtensionInterface $extension)
    {
        $this->extensions[] = $extension;
    }

    public function getList()
    {
        $list = array();

        foreach ($this->extensions as $extension) {
            $extension->build($list);
        }

        return $list;
    }
}
