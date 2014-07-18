<?php

namespace DOH\InfraBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ServerSpecSheet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DOH\InfraBundle\Entity\ServerSpecSheetRepository")
 */
class ServerSpecSheet
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
     * @var Server
     *
     * @ORM\OneToOne(targetEntity="Server", mappedBy="specSheet")
     */
    private $server;

    /**
     * @var string
     *
     * @ORM\Column(name="operating_system", type="string", length=255)
     */
    private $operatingSystem;

    /**
     * @var string
     *
     * @ORM\Column(name="ram", type="integer")
     */
    private $ram;

    /**
     * @var integer
     *
     * @ORM\Column(name="vcpu", type="integer")
     */
    private $vcpu;

    /**
     * @var integer
     *
     * @ORM\Column(name="disk_space", type="integer")
     */
    private $diskSpace;

    /**
     * @var array
     *
     * @ORM\Column(name="partition_info", type="array")
     */
    private $partitionInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * @param Server $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return Server
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set operatingSystem
     *
     * @param string $operatingSystem
     * @return ServerSpecSheet
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * Get operatingSystem
     *
     * @return string 
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * Set ram
     *
     * @param string $ram
     * @return ServerSpecSheet
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return string 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set vcpu
     *
     * @param integer $vcpu
     * @return ServerSpecSheet
     */
    public function setVcpu($vcpu)
    {
        $this->vcpu = $vcpu;

        return $this;
    }

    /**
     * Get vcpu
     *
     * @return integer 
     */
    public function getVcpu()
    {
        return $this->vcpu;
    }

    /**
     * Set diskSpace
     *
     * @param integer $diskSpace
     * @return ServerSpecSheet
     */
    public function setDiskSpace($diskSpace)
    {
        $this->diskSpace = $diskSpace;

        return $this;
    }

    /**
     * Get diskSpace
     *
     * @return integer 
     */
    public function getDiskSpace()
    {
        return $this->diskSpace;
    }

    /**
     * Set partitionInfo
     *
     * @param array $partitionInfo
     * @return ServerSpecSheet
     */
    public function setPartitionInfo($partitionInfo)
    {
        $this->partitionInfo = $partitionInfo;

        return $this;
    }

    /**
     * Get partitionInfo
     *
     * @return array 
     */
    public function getPartitionInfo()
    {
        return $this->partitionInfo;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ServerSpecSheet
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
