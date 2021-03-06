<?php

namespace DOH\InfraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DOH\GuideBundle\Entity\Guide;

/**
 * ServerChangelog
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DOH\InfraBundle\Entity\ServerChangelogRepository")
 */
class ServerChangelog
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
     * @ORM\ManyToOne(targetEntity="Server", inversedBy="changelogs")
     * @ORM\JoinColumn(name="server_id", referencedColumnName="id")
     */
    private $server;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var Guide|null
     *
     * @ORM\ManyToOne(targetEntity="\DOH\GuideBundle\Entity\Guide")
     * @ORM\JoinColumn(name="guide_id", referencedColumnName="id", nullable=true)
     */
    private $guide;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $guideParameters;

    public function __construct()
    {
        $this->guideParameters = array();
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
     * Set title
     *
     * @param string $title
     * @return ServerChangelog
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ServerChangelog
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param Guide|null $guide
     */
    public function setGuide($guide)
    {
        $this->guide = $guide;
    }

    /**
     * @return Guide|null
     */
    public function getGuide()
    {
        return $this->guide;
    }

    /**
     * @param array $guideParameters
     */
    public function setGuideParameters(array $guideParameters)
    {
        $this->guideParameters = $guideParameters;
    }

    /**
     * @return array
     */
    public function getGuideParameters()
    {
        return $this->guideParameters;
    }
}
