<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An event.
 *
 * @ORM\Entity
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Name of the event.
     *
     * @var string
     *
     * @ORM\Column(nullable=false)
     * @Assert\Type(type="string")
     * @Groups({"event_read", "event_write"})
     */
    private $name;

    /**
     * Start time of the event.
     *
     * @var \Datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotNull
     *
     * @Groups({"event_read", "event_write"})
     */
    private $startTime;

    /**
     * Time of the end of event.
     *
     * @var \Datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotNull
     *
     * @Groups({"event_read", "event_write"})
     */
    private $endTime;

    /**
     * Description.
     *
     * @var string
     *
     * @ORM\Column(nullable=true, type="text")
     * @Assert\Type(type="string")
     * @Groups({"event_read", "event_write"})
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=false)
     * @Groups({"event_read", "event_write"})
     * @Assert\Type(type="bool")
     */
    private $enabled;

    /**
     * Number of places available.
     *
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"event_read", "event_write"})
     * @Assert\Type(type="integer")
     */
    private $numberOfPlaces;

    /**
     * Address.
     *
     * @var string
     *
     * @ORM\Column(nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"event_read", "event_write"})
     */
    private $address;

    /**
     * @var Registration[]
     * @ORM\OneToMany(targetEntity="Registration", mappedBy="event", cascade={"remove", "persist"} )
     * @Groups({"event_read", "event_write", "registration_read", "registration_write"})
     */
    private $registrations;

    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->registrations = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getNumberOfPlaces()
    {
        return $this->numberOfPlaces;
    }

    /**
     * @param int $numberOfPlaces
     */
    public function setNumberOfPlaces($numberOfPlaces)
    {
        $this->numberOfPlaces = $numberOfPlaces;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Add registrations.
     *
     * @param \AppBundle\Entity\Registration $registrations
     *
     * @return Event
     */
    public function addRegistration(Registration $registrations)
    {
        $this->registrations[] = $registrations;

        return $this;
    }

    /**
     * Remove registrations.
     *
     * @param \AppBundle\Entity\Registration $registrations
     */
    public function removeRegistration(Registration $registrations)
    {
        $this->registrations->removeElement($registrations);
    }

    /**
     * Get registrations.
     *
     * @return Registration[]
     */
    public function getRegistrations()
    {
        return $this->registrations;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return \Datetime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param \Datetime $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }
}
