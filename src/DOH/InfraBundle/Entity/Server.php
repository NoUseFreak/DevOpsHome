<?php

namespace DOH\InfraBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var ServerNic
     *
     * @ORM\OneToMany(targetEntity="ServerNic", mappedBy="server", cascade={"persist"})
     */
    private $nics;

    /**
     * @var ServerChangelog[]
     *
     * @ORM\OneToMany(targetEntity="ServerChangelog", mappedBy="server", cascade={"persist"})
     */
    private $changelogs;

    public function __construct()
    {
        $this->nics       = new ArrayCollection();
        $this->changelogs = new ArrayCollection();
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
     * @param ArrayCollection $nics
     */
    public function setNics(ArrayCollection $nics)
    {
        $this->nics = $nics;
    }

    /**
     * @return ArrayCollection
     */
    public function getNics()
    {
        return $this->nics;
    }

    /**
     * @param ServerChangelog[] $changelogs
     */
    public function setChangelogs($changelogs)
    {
        $this->changelogs = $changelogs;
    }

    /**
     * @return ServerChangelog[]
     */
    public function getChangelogs()
    {
        return $this->changelogs;
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
