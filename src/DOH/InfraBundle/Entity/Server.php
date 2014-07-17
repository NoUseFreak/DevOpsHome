<?php

namespace DOH\InfraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Server
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DOH\InfraBundle\Entity\ServerRepository")
 */
class Server
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ServerSpecSheet
     *
     * @ORM\OneToOne(targetEntity="ServerSpecSheet", inversedBy="server", cascade={"persist"})
     * @ORM\JoinColumn(name="spec_sheet_id", referencedColumnName="id")
     */
    private $specSheet;

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
     * @return Server
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
     * @param ServerSpecSheet $specSheet
     */
    public function setSpecSheet($specSheet)
    {
        $this->specSheet = $specSheet;
    }

    /**
     * @return ServerSpecSheet
     */
    public function getSpecSheet()
    {
        return $this->specSheet;
    }
}
