<?php

namespace DOH\InfraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServerNic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DOH\InfraBundle\Entity\ServerNicRepository")
 */
class ServerNic
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
     * @ORM\ManyToOne(targetEntity="Server", inversedBy="nics")
     * @ORM\JoinColumn(name="server_id", referencedColumnName="id")
     */
    private $server;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="netmask", type="string", length=255, nullable=true)
     */
    private $netmask;

    /**
     * @var string
     *
     * @ORM\Column(name="gateway", type="string", length=255, nullable=true)
     */
    private $gateway;

    /**
     * @var string
     *
     * @ORM\Column(name="dns", type="text", nullable=true)
     */
    private $dns;


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
    public function setServer(Server $server)
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
     * Set name
     *
     * @param string $name
     * @return ServerNic
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
     * Set ip
     *
     * @param string $ip
     * @return ServerNic
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set netmask
     *
     * @param string $netmask
     * @return ServerNic
     */
    public function setNetmask($netmask)
    {
        $this->netmask = $netmask;

        return $this;
    }

    /**
     * Get netmask
     *
     * @return string 
     */
    public function getNetmask()
    {
        return $this->netmask;
    }

    /**
     * Set gateway
     *
     * @param string $gateway
     * @return ServerNic
     */
    public function setGateway($gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * Get gateway
     *
     * @return string 
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * Set dns
     *
     * @param string $dns
     * @return ServerNic
     */
    public function setDns($dns)
    {
        $this->dns = $dns;

        return $this;
    }

    /**
     * Get dns
     *
     * @return string 
     */
    public function getDns()
    {
        return $this->dns;
    }
}
