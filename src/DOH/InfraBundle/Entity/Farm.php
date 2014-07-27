<?php

namespace DOH\InfraBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Farm
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DOH\InfraBundle\Entity\FarmRepository")
 */
class Farm
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Server", mappedBy="farms")
     */
    private $servers;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    public function __construct()
    {
        $this->servers = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Farm
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param ArrayCollection $servers
     */
    public function setServers($servers)
    {
        $this->servers = $servers;
    }

    /**
     * @return ArrayCollection
     */
    public function getServers()
    {
        return $this->servers;
    }
}
